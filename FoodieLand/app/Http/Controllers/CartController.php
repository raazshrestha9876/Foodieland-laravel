<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller{

public function addToCart($id, Request $request){
    if(Auth::user()){
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->food_id = $id;
        $cart->quantity = $request->food_quantity;

        $food = Food::find($id);

        $cart->unit_price = $food->food_price;
        $cart->save();

        return back()->with('message','Food item Added Successfully');

    }else{
        return redirect('/login');
    }
}
public function destroy($id){
    $cart = Cart::find($id);
    $cart->delete();
    return back()->with('message','Card item deleted successfully');
}
}
