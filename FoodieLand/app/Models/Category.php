<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Food;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name','slug', 'category_image'];

    // public function setNameAttribute($value){
    //     $this->attributes['category_name'] = $value;
    //     $this->attributes['slug'] = Str::slug($value);
    // }
    public static function boot(){
        parent::boot();

        static::creating(function($category){
            $category->slug = Str::slug($category->category_name);
        });
    }
     
    public function food(){
        return $this->hasMany(Food::class);
    }
   
}
