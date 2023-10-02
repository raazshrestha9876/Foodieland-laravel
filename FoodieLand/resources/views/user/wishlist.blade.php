@extends('user.layout.main')
@section('content')

<?php

use App\Models\Wishlist;

if (auth()->user()) {
    $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();
} else {
    $wishlists = null;
}
?>


@if(Auth::user())
<section class="page-header">
    <h2>#Wishlist</h2>
    <p>Save more with coupons $ up to 50% off!</p>
</section>

<section class="cart section-p1 section-m1">

    <table width="100%">
        <thead>
            <tr>
                <td>REMOVE</td>
                <td>IMAGE</td>
                <td>FOOD</td>
                <td>PRICE</td>
                <td>QUANTITY</td>
            </tr>
        </thead>
        <tbody>
            @foreach($wishlists as $wishlist)
            <tr>
                <form action="/add-to-cart/{{$wishlist->food_id}}" method="POST">
                    @csrf
                    <td><a href="/delete-wishlist/{{$wishlist->id}}"><i class="fa fa-times-circle" style="font-size:24px"></i></a></td>
                    <td><img src="{{asset($wishlist->food['food_image'])}}" alt=""></td>
                    <td>{{$wishlist->food['food_name']}}</td>
                    <td>{{$wishlist->food['food_price']}}</td>
                    <td>
                        <input type="number" name="food_quantity" value="1" max="100" id="food_quantity">
                        <button class="hero-btn" type="submit"><i class="fa fa-shopping-bag cartlist"></i></button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endif
@endsection