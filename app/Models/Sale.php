<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Sale Deliveries
    public function saleDelivery(){
        return $this->hasOne(SaleDelivery::class);
    }

    // Relasi to Documents
    public function document(){
        return $this->hasOne(Document::class);
    }

    // Relasi to Stock
    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    // Relasi to leasing
    public function leasing(){
        return $this->belongsTo(Leasing::class);
    }

    // Relasi to User
    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relasi to User
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }
}
