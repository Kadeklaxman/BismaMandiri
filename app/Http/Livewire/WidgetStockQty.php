<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use Livewire\Component;

class WidgetStockQty extends Component
{
    public function render()
    {
            $stock = Unit::sum('qty');
        return view('livewire.widget-stock-qty', compact('stock'));
    }
}
