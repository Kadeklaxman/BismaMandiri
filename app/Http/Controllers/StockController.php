<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Log;
use App\Models\Stock;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::orderBy('model_name', 'desc')->get();
        $data = Unit::all();
        return view('page', compact('data','unit'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // Get Stok ID from Input
        $stockId = $req->unit_id;

        // Get Latest Stok from Stock Table
        $latestStock = Unit::where('id',$stockId)->sum('qty');

        // Get Entry QTY
        $entryQty = $req->in_qty;

        // Update Stock
        $updateStock = $latestStock + $entryQty;
        // dd($stockId);

        // Update Unit Table
        $stock = Unit::where('id',$stockId)->first();
        $stock->qty = $updateStock;
        $stock->updated_by = Auth::user()->id;
        $stock->save();

        toast('Data entry berhasil disimpan','success');
        return redirect()->back()->withInput($req->except('id', 'model_name','color','year_mc','on_hand','in_qty'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $Stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $color = Color::all();
        return view('page', compact('unit','color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $Stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Stock $unit)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $Stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $Stock)
    {
        //
    }

    public function delete($id){
        Stock::find($id)->delete();

        // Write log
        $log = new Log;
        $log->log_date = Carbon::now('GMT+8')->format('Y-m-d');
        $log->activity = 'deletes a stock data';
        $log->user_id = Auth::user()->id;
        $log->save();

        toast('Data stock berhasil dihapus','success');
        return redirect()->back();
    }

    public function deleteall(Request $req){
        Stock::whereIn('id',$req->pilih)->delete();

        // Write log
        $log = new Log;
        $log->log_date = Carbon::now('GMT+8')->format('Y-m-d');
        $log->activity = 'deletes some stocks data';
        $log->user_id = Auth::user()->id;
        $log->save();

        toast('Data stock berhasil dihapus','success');
        return redirect()->back();
    }

    public function ratio(){
        return view('page');
    }
}
