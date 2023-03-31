<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceMail;

class DokumenController extends Controller
{
    public function index(){
        
        $today = Carbon::now('GMT+8')->format('Y-m-d');

        $sale = Sale::orderBy('sale_date','desc')->get();
            $data = Document::join('sales','documents.sale_id','sales.id')
            ->join('units','sales.id','units.id')
            ->join('users','documents.created_by','users.id')
            ->select('sales.sale_date', 'sales.customer_name', 'units.model_name', 'documents.stck', 'documents.stnk', 'documents.bpkb', 'sales.frame_no', 'documents.id as id', 'users.name')
            ->limit(20)->get();
            return view('page', compact('data','today','sale'));
        
        
    }
    public function edit(Document $document){
        return view('page', compact('document'));
    }

    public function update(Request $request, Document $document){
        $data = Document::find($document->id);
        
        $data->stck = $request->stck;
        $data->stnk = $request->stnk;
        $data->bpkb = $request->bpkb;
        $data->document_note = $request->document_note;
        //UBAH STATUS DOKUMEN//
        if($data->stck != ""){
            $data->stck_status = 'finished';
        }
        if($data->stnk != ""){
            $data->stnk_status = 'finished';
        }
        if($data->bpkb != ""){
            $data->bpkb_status = 'finished';
        }

        if($data->bpkb != "" && $data->stck != "" && $data->stnk != "" && $data->sale->customer_email != ""){
            Mail::to($data->sale->customer_email)
                ->send(new ServiceMail());
        }
        $data->save();
        return redirect()->back();
    }
    
    public function show(Request $request){
        
    }
    
    public function history(Request $req){
        $start = $req->start;
        $end = $req->end;
        if ($start == null && $end == null) {
            $data = Document::join('sales','documents.sale_id','sales.id')
            ->orderBy('sale_date','desc')
            ->where('bpkb_status','finished')->get();
            
        } else {
            $data = Document::join('sales','documents.sale_id','sales.id')
            ->whereBetween('sale_date',[$req->start, $req->end])->get();
        }
        return view('page', compact('data','start','end'));
    }
}
