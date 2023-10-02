@extends('admin.layouts.main')
@section('content')

@if(session('message'))
<div class="container mt-3 alert alert-success">
  <span>{{session('message')}}</span>
</div>
@endif
<div class="container  w-75" style="margin-top:50px">
  <h3 class="text-center text-success">ADD FOOD ITEM</h3>
  <form action="/add-food" method="POST" enctype="multipart/form-data">
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
      <input type="text" id="name" name="food_name" placeholder="Name">
    </div>

    <div class="form-group mb-2">
      <label for="foods">Food Price</label>
      <br>
      <input type="number" id="price" name="food_price" placeholder="Price">
    </div>

    <div class="form-group mb-2">
      <label for="foods">Food Description</label>
      <textarea id="desc" name="food_desc" placeholder="Description" style="height: 150px;"></textarea>
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
<div class="container my-5 w-75">
  <h3 class="text-center text-success p-2">VIEW FOOD ITEM</h3>
  <table id="useful">
    <tr>
      <th>Category Name</th>
      <th>Food Name</th>
      <th>Food Price</th>
      <th>Food Description</th>
      <th>Food Status</th>
      <th>Food Image</th>
      <th>Action</th>
    </tr>
    @foreach($foods as $food)
    <tr>
      <td>{{$food->category['category_name']}}</td>
      <td>{{$food->food_name}}</td>
      <td>{{$food->food_price}}</td>
      <td>{{$food->food_desc}}</td>
      <td>{{$food->status ? 'Active' : 'Inactive'}}</td>
      <td><img src="{{$food->food_image}}" width="100px" height="100px" alt=""></td>
      <td>
        <a href="/edit-food/{{$food->id}}" class="btn btn-outline-success px-4 my-2">Edit</a>
        <a href="/delete-food/{{$food->id}}" class="btn btn-outline-danger px-3">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>

</div>
@endsection