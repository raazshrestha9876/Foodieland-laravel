<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
  public function addToWishlist($id, Request $request)
  {
    if (Auth::user()) {
      $wishlist = new Wishlist();
      $wishlist->user_id = Auth::user()->id;
      $wishlist->food_id = $id;
      // $wishlist->quantity = $request->quantity;
      $food = Food::find($id);
      $wishlist->unit_price = $food->food_price;
      $wishlist->save();
      return back()->with('message', 'food item added to your favourite list.');
    } else {
      return redirect('/login');
    }
  }
  public function destroy($id)
  {
    $wishlist = Wishlist::find($id);
    $wishlist->delete();
    return back()->with('message', 'food item removed from your favourite list.');
  }
}
