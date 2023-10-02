<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Food extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public static function boot(){
        parent::boot();

        static::creating(function($food){
            $food->slug = Str::slug($food->food_name);
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function order_details(){
        return $this->hasMany(OrderDetails::class);
    }

}
