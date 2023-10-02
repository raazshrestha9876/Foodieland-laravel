@extends('user.layout.main')
@section('content')


<?php

use App\Models\Food;
use App\Models\Category;

$food = Food::find($id);
$foods = Food::take(4)->get();
$categories = Category::latest()->get();

?>



<section class="proDetails section-p1 section-m1">
    <div class="single-pro-image">
        <img src="{{asset($food->food_image)}}" alt="" width="100%" id="mainImg">
    </div>
    <div class="single-pro-details">
        <div class="alert_main">
            @if(session('message'))
            <div class="alert">
                {{session('message')}}
            </div>
            @endif
        </div>

        <form action="/add-to-cart/{{$food->id}}" method="POST">
            @csrf
            <h6>Category: {{$food->category['category_name']}}</h6>
            <h4>Food: {{$food->food_name}}</h4>
            <h6>Price: {{$food->food_price}}</h6>
            <input type="number" name="food_quantity" value="1" max="100">
            <button class="hero-btn" type="submit">Add To Cart</button>
            <h4>Description</h4>
            <span>{{$food->food_desc}}</span>
        </form>
    </div>
</section>

<section class="food-item section-p1 section-m1">
    <h2>Our Popular Dishes</h2>

    <div class="pro-container">
        @foreach($foods as $food)
        <div class="pro">
            <img src="{{asset($food->food_image)}}" alt="{{$food->food_name}}">
            <div class="desc">
                <span>{{$food->category['category_name']}}</span>
                <h4>{{$food->food_name}}</h4>
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h4>{{$food->food_price}}</h4>
            </div>
            <a href=""><i class="fa fa-shopping-bag cart"></i></a>
        </div>
        @endforeach
    </div>

</section>
@endsection