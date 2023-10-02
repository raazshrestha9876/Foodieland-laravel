<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;



class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order_details = OrderDetails::where('order_id', $order->id)->get();
            foreach ($order_details as $details) {
                $food = Food::where('id', $details->food_id)->first();
                $details['food_name'] = $food->food_name;
            }
            $order['order_details'] = $order_details;
        }
        return view('admin.order.orderList', compact('orders'));
    }
    public function updateOrderView($id)
    {
        $order = Order::find($id);
        return view('admin.order.orderEdit', compact('order'));
    }

    public function changeOrderDetails(Request $request, $id)
    {
        $order = Order::find($id);
        $order->payment_status = $request->payment_status;
        $order->delivery_time = $request->delivery_time;
        $order->order_status = $request->order_status;
        $order->update();
        return redirect('orders')->with('message', 'Order Details Updated');
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);
        if ($order->order_status == 'delivering' || $order->order_status == 'delivered') {
            return  back()->with('message', 'Cannot cancel the order as it is not in pending status.');
        } else {
            $order->order_status = 'canceled';
            $order->save();
            return back()->with('message', 'Order canceled successfully.');
        }
    }

    public function countTodayOrders()
    {
        $todayOrdersCount = Order::whereDate('created_at', Carbon::today())->count();
        return view('admin.index', compact('todayOrdersCount'));
    }
}
