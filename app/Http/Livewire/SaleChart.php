<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SaleChart extends Component
{
    public function render()
    {
        $yearNow = Carbon::now('GMT+8')->format('Y');
        $yearLast = $yearNow-1;
        $userData = Sale::select(DB::raw("COUNT(*) as count"))
        ->whereYear("sale_date",date('Y'))
        ->groupBy(DB::raw("Month(sale_date)"))
        ->pluck('count');
        $jan = Sale::whereMonth('sale_date',1)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $feb = Sale::whereMonth('sale_date',2)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $mar = Sale::whereMonth('sale_date',3)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $apr = Sale::whereMonth('sale_date',4)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $may = Sale::whereMonth('sale_date',5)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $jun = Sale::whereMonth('sale_date',6)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $jul = Sale::whereMonth('sale_date',7)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $aug = Sale::whereMonth('sale_date',8)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $sep = Sale::whereMonth('sale_date',9)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $oct = Sale::whereMonth('sale_date',10)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $nov = Sale::whereMonth('sale_date',11)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');
        $dec = Sale::whereMonth('sale_date',12)
        ->whereYear('sale_date',$yearNow)
        ->sum('sale_qty');

        // $janly = Sale::whereMonth('sale_date',1)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $febly = Sale::whereMonth('sale_date',2)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $marly = Sale::whereMonth('sale_date',3)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $aprly = Sale::whereMonth('sale_date',4)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $mayly = Sale::whereMonth('sale_date',5)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $junly = Sale::whereMonth('sale_date',6)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $jully = Sale::whereMonth('sale_date',7)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $augly = Sale::whereMonth('sale_date',8)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $seply = Sale::whereMonth('sale_date',9)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $octly = Sale::whereMonth('sale_date',10)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $novly = Sale::whereMonth('sale_date',11)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        // $decly = Sale::whereMonth('sale_date',12)
        // ->whereYear('sale_date',$yearLast)
        // ->sum('sale_qty');
        return view('livewire.sale-chart', compact('userData','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'));
    }
}
