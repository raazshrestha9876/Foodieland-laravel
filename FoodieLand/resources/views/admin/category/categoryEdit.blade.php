@extends('admin.layouts.main')
@section('content')

@if(session('message'))
<div class="container mt-3 alert alert-success">
  <span>{{session('message')}}</span>
</div>
@endif
<div class="container my-5 w-50">
  <h3 class="text-center text-success">ADD CATEGORIES</h3>
  <form action="/update-category/{{$category->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-2">
      <label for="foods">Food Name</label>
      <input type="text" id="category_image" name="category_name" placeholder="category_name">
    </div>
    
    <div class="form-group mb-2">
      <label for="foods">Food Status</label>
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
</div>
@endsection