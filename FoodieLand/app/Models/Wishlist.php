<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
