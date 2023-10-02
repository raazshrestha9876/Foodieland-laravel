@extends('admin.layouts.main')
@section('content')

@if(session('message'))
<div class="container mt-3 alert alert-success">
    <span>{{session('message')}}</span>
</div>
@endif
<div class="container my-2">
    <h3 class="text-center text-success">ADD FOOD ITEM</h3>
    <form action="/update-food/{{$food->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="foods">Select Food Category</label>
            <select name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-2">
            <label for="foods">Food Name</label>
            <input type="text" id="name" name="food_name" placeholder="Name" value="{{$food->food_name}}">
        </div>

        <div class="form-group mb-2">
            <label for="foods">Food Price</label>
            <br>
            <input type="number" id="price" name="food_price" placeholder="Price" value="{{$food->food_price}}">
        </div>

        <div class="form-group mb-2">
            <label for="foods">Food Description</label>
            <textarea id="desc" name="food_desc" placeholder="Description" style="height: 150px;" value="{{$food->food_desc}}"></textarea>
        </div>

        <div class="form-group mb-2">
            <label for="foods">Food Status</label>
            <select name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <div class="form-group mb-2">
            <label for="foods">Food Image</label>
            <br>
            <input type="file" id="image" name="food_image">
        </div>
        <div class="form-group mb-2">
            <input type="submit" value="ADD ITEM">
        </div>

    </form>
</div>
@endsection