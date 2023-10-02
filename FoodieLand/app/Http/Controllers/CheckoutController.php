<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {

        if ($request->payment_method == 'khalti') {
            $order = new Order();
            $order->user_id = auth()->id();
            $order->order_code = 'foodie-'.Str::random(10); 
            $order->payment_method = $request->payment_method;
            $order->delivery_time = "30min";
            $order->order_total =  0;
            $order->order_status = 'pending';
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->email = $request->email;
            $order->note = $request->note;
            $order->save();


            $carts = Cart::where('user_id', auth()->user()->id)->get();

            foreach ($carts as  $cart) {
                $order_details = new OrderDetails();
                $order_details->food_id = $cart->food_id;
                $order_details->quantity = $cart->quantity;
                $order_details->unit_price = $cart->unit_price;
                $order_details->order_id = $order->id;
                $order_details->save();

                $order->order_total += $cart->quantity * $cart->unit_price;
                $order->update();

                $cart->delete();
            }

            $url = 'pay-with-khalti/' . $order->order_total . '/' . $order->id;
            return redirect($url);
        } else {
            $order = new Order();
            $order->user_id = auth()->id();
            $order->order_code = 'foodie-'.Str::random(10);
            $order->payment_method = $request->payment_method;
            $order->delivery_time = "30min";
            $order->order_total =  0;
            $order->order_status = 'pending';
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->email = $request->email;
            $order->note = $request->note;
            $order->save();


            $carts = Cart::where('user_id', auth()->user()->id)->get();

            foreach ($carts as  $cart) {
                $order_details = new OrderDetails();
                $order_details->food_id = $cart->food_id;
                $order_details->quantity = $cart->quantity;
                $order_details->unit_price = $cart->unit_price;
                $order_details->order_id = $order->id;
                $order_details->save();

                $order->order_total += $cart->quantity * $cart->unit_price;
                $order->update();

                $cart->delete();
            }
            return back()->with('message', 'Your Order Has Been Placed');
        }
    }
    public function payWithKhalti($total_price, $order_id)
    {
        return view('user.payWithKhalti', compact('total_price', 'order_id'));
    }
    public function updateOrder($id)
    {
        $order = Order::find($id);
        $order->payment_status = 'paid';
        $order->update();
        return redirect('/')->with('message', 'Your Order Has Been Placed Successfully');
    }
   
}
