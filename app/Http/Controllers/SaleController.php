<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now('GMT+8')->format('Y-m-d');
        $unit = Unit::orderBy('qty','desc')->get();
        $data = Sale::where('sale_date',$today)->orderBy('id','desc')->get();
        return view('page', compact('today','data','unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        // Get Stok ID from Input
        $unit_id = $req->unit_id;

        // Get Latest Stok from Stock Table
        $latestStock = Unit::where('id',$unit_id)->sum('qty');

        // Get Sold QTY
        $soldQty = 1;

        // Update Stock
        $updateStock = $latestStock - $soldQty;
        
        $frameSale = Sale::where('frame_no',$req->frame_no)->count('frame_no');

        if ($frameSale > 0 ) {
            alert()->warning('Warning','Frame number already sold!');
            return redirect()->back()->with('auto', true)->withInput($req->input());
        } else {
            $data = new Sale;
            $data->sale_date = $req->sale_date;
            $data->unit_id = $req->unit_id;
            $data->nik = $req->nik;
            $data->customer_name = strtoupper($req->customer_name);
            $data->customer_email = strtolower($req->customer_email);
            $data->phone = $req->phone;
            $data->address = $req->address;
            $data->sale_qty = 1;
            $data->frame_no = strtoupper($req->frame_no);
            $data->engine_no = $req->engine_no;
            $data->created_by = Auth::user()->id;
            $data->updated_by = Auth::user()->id;
            $data->save();

            // Update Unit Table
            $stock = Unit::where('id',$unit_id)->first();
            $stock->qty = $updateStock;
            $stock->updated_by = Auth::user()->id;
            $stock->save();
            
            /** ============== Create Documents ============== */ 
            $cekframe = Sale::where('frame_no',$req->frame_no)->count('frame_no');
            if($cekframe > 0){
                $saleId = Sale::where('frame_no',$req->frame_no)->sum('id');
                $data = new Document;
                $data->document_name = $req->customer_name;
                $data->sale_id = $saleId;
                $data->stck = $req->stck;
                $data->stnk = $req->stnk;
                $data->bpkb = $req->bpkb;
                $data->document_note = $req->document_note;
                $data->created_by = Auth::user()->id;
                $data->updated_by = Auth::user()->id;
                $data->save();
            }
            /** ============== END Create Documents ============== */ 
        
            toast('Data sale berhasil disimpan','success');
            return redirect()->back()->withInput($req->except('unit_id', 'model_name','color','year_mc','on_hand','frame_no','engine_no','nik','customer_name','phone','address'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function delete($id){
        
        $stockId = Sale::where('id',$id)->pluck('unit_id');

        // Get Latest Stock from Stock Table
        $latestStock = Unit::where('id',$stockId)->sum('qty');

        // Get Deleted QTY
        $delQty = Sale::where('id',$id)->sum('sale_qty');

        // Update Stock
        $updateStock = $latestStock + $delQty;

        // dd($updateStock);
        Sale::find($id)->delete();
            
        // Update Stock Table
        $stock = Unit::where('id',$stockId)->first();
        $stock->qty = $updateStock;
        $stock->updated_by = Auth::user()->id;
        $stock->save();

        // Delete Document by Sale ID
        // Get document ID by Sale ID
        $docId = Document::where('sale_id',$id)->pluck('id');
        Document::where('id',$docId)->delete();
        
        toast('Data sale berhasil dihapus','success');
        return redirect()->back();
    }

    public function deleteall(Request $req){
        Sale::whereIn('id',$req->pilih)->delete();
        toast('Data sale berhasil dihapus','success');
        return redirect()->back();
    }

    public function history(Request $req){
        
        $start = $req->start;
        $end = $req->end;
        if ($start == null && $end == null) {
                $data = Sale::orderBy('sale_date','desc')->get(); 
        } else {
                $data = Sale::whereBetween('sale_date',[$req->start, $req->end])->get();
        }
        return view('page', compact('data','start','end'));
    }
}
