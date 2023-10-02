@extends('admin.layouts.main')
@section('content')

@if(session('message'))
<div class="container mt-3 alert alert-success">
  <span>{{session('message')}}</span>
</div>
@endif
<div class="wrapper">
  <div class="container my-5 w-75">
    <h3 class="text-center text-success">ADD CATEGORIES</h3>
    <form action="/add-to-category" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-2">
        <label for="foods">Food Name</label>
        <input type="text" id="category_image" name="category_name" placeholder="category_name">
      </div>

      <div class="form-group mb-2">
        <label for="foods">Category Status</label>
        <select name="status">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
        </select>
      </div>

      <div class="form-group mb-4">
        <label for="foods">Category Image</label>
        <input type="file" id="category_image" name="category_image" placeholder="category_image">
      </div>

      <div class="form-group mb-2">
        <input type="submit" value="ADD CATEGORY">
      </div>
    </form>
  </div>
  <div class="container my-5" style="width:75%">
    <h3 class="text-center text-success p-2">VIEW CATEGORIES</h3>
    <table id="useful">
      <tr>
        <th>Category Name</th>
        <th>Category Status</th>
        <th>Category Image</th>
        <th>Action</th>
      </tr>
      @foreach($categories as $category)
      <tr>
        <td>{{$category->category_name}}</td>
        <td>{{$category->status ? 'Active' : 'Inactive'}}</td>
        <td><img src="{{$category->category_image}}" alt="{{$category->category_name}}" width="100px" height="100px"></td>
        <td>
          <a href="/edit-category/{{$category->id}}" class="btn btn-outline-success px-4 mx-1">Edit</a>
          <a href="/delete-category/{{$category->id}}" class="btn btn-outline-danger px-3">Delete</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection