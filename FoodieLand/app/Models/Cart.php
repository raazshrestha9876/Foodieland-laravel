<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','food_id','quantity','unit_price'];

    public function food(){
        return $this->belongsTo(Food::class);
    }
   
}
