@extends('user.layout.main')
@section('content')



<?php

use App\Models\Food;
use App\Models\Category;

$foods = Food::where('category_id', $category->id)->latest()->get();
$categories = Category::take(6)->get();
?> 

<section class="page-header">
    <h2>STAY FOOD</h2>
    <p>Save more with coupons $ up to 50% off!</p>

</section>

<section class="category-section section-m1">
    <div class="head-desc">
        <div class="desc-1">
            <h2>Categories</h2>
            <span>Inspired by your interests</span>
        </div>
        <div class="desc-2">
            <button class="hero-btn">See More<i class="fa fa-angle-right" aria-hidden="true"></i>
            </button>
        </div>

    </div>
    <div class="menu">
        @foreach($categories as $category)
        <div class="menu-col" onclick="window.location.href='/view-category/{{$category->slug}}'">
            <div class="menu-icon">
                <img src="{{asset($category->category_image)}}" alt="">
            </div>
            <h4>{{$category->category_name}}</h4>
        </div>
        @endforeach
    </div>
</section> 

<section class="food-item section-m1">
    <!-- <h2>{{$category->category_name}}</h2> -->

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
            <a href="/add-to-wishlist/{{$food->id}}"><i class="fa fa-heart wishlist"></i></a>
            <a href=""><i class="fa fa-shopping-bag cartlist"></i></a>
        </div>
        @endforeach
    </div>
</section>


<section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
</section>
@endsection