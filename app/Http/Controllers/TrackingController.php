<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Sale;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    public function index(){
        $data = Sale::all();
        $data = Document::join('sales','documents.sale_id','sales.id')
            ->join('units','sales.id','units.id')
            ->join('users','documents.created_by','users.id')
            ->select('sales.sale_date', 'sales.customer_name', 'units.model_name', 'documents.stck_status', 'documents.stnk_status', 'documents.bpkb_status', 'sales.frame_no', 'documents.id as id', 'users.name')
            ->limit(20)->get();
        return view('customer.tracking', compact('data','dokumen'));
    }

    public function show(Request $frame_no)
    {
        $frame_no = $frame_no->input('frame_no');
        // Lakukan operasi pencarian kendaraan berdasarkan nomor frame
        $cek = DB::table('sales')->where('frame_no', $frame_no)->first();
        if($cek){
        $data = Document::join('sales','documents.sale_id','sales.id')
            ->join('units','sales.id','units.id')
            ->join('users','documents.created_by','users.id')
            ->select('sales.sale_date', 'sales.customer_name', 'units.model_name', 'documents.stck_status', 'documents.stnk_status', 'documents.bpkb_status', 'sales.frame_no', 'documents.id as id', 'users.name')
            ->where('frame_no', $frame_no)
            ->limit(20)->get();
        return view('customer.datatracking', compact ('cek','data'));
        }
        else{
            return view('customer.tracking');
        }
    }
    
}
