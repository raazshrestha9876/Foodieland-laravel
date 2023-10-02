<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index');
    }

    public function viewFoods()
    {
        return view('user.food');
    }
    public function viewSingleFood($id)
    {
        return view('user.singlefood', compact('id'));
    }
    public function viewCategory($slug)
    {

        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $foods = Food::where('category_id', $category->id)->where('status', '1')->get();
            return view('user.category', compact('category', 'foods'));
        } else {
            return redirect('/')->with('status', "Slug doesnot exits");
        }
    }

    public function cart()
    {
        return view('user.cart');
    }
    public function wishlist()
    {
        return view('user.wishlist');
    }
    public function orderCheckOut()
    {
        return view('user.checkout');
    }
    public function checkout()
    {
        return view('user.checkout');
    }
    public function orderlist()
    {
        return view('user.order');
    }
    public function account()
    {
        return view('user.layout.main');
    }
    
   
}
