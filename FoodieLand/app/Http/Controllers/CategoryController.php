<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->status = $request->status;

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('category/images/',$image_new_name);
            // storing name
            $category->category_image = 'category/images/'.$image_new_name;
        }else{
            $category->category_image = 'category/images/default.jpg';
        }

        $category->save();
        return back()->with('message', 'Category data inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.categoryEdit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->status = $request->status;

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('category/images/',$image_new_name);
            // storing name
            $category->category_image = 'category/images/'.$image_new_name;
        }else{
            $category->category_image = 'category/images/default.jpg';
        }
       
        $category->update();
        return redirect('/categories')->with('message','Category data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('message','Category data deleted successfully');
    }
}
