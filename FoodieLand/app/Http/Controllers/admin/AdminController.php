<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use PDO;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function categories(){
        $categories = Category::take(6)->get();
        return view('admin.category.categoryList',compact('categories'));
    }
    function foods(){
        $categories = Category::take(6)->get();
        $foods = Food::latest()->get(); 
        return view('admin.food.foodList',compact('categories','foods'));
    }
    // function orders(){
    //     $orders  = Order::all();
    //     return view('admin.order.orderList',compact('orders'));
    // }
    
}
