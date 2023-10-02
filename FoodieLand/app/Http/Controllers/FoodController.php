<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food();
        $food->food_name = $request->food_name;
        $food->slug = Str::slug($request->food_name);
        $food->food_desc = $request->food_desc;
        $food->status = $request->status;
        $food->food_price = $request->food_price;
        $food->category_id = $request->category_id;


        if ($request->hasFile('food_image')) {
            $image = $request->file('food_image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('food/images/', $image_new_name);
            // storing name
            $food->food_image = 'food/images/' . $image_new_name;
        } else {
            $food->food_image = 'food/images/default.jpg';
        }
        $food->save();

        return back()->with('message', 'food Saved Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        $categories = Category::latest()->get();
        return view('admin.food.foodEdit', compact('food', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        $food->food_name = $request->food_name;
        $food->slug = Str::slug($request->food_name);
        $food->food_desc = $request->food_desc;
        $food->food_price = $request->food_price;
        $food->status = $request->status;
        $food->category_id = $request->category_id;


        if ($request->hasFile('food_image')) {
            $image = $request->file('food_image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('food/images/', $image_new_name);
            // storing name
            $food->food_image = 'food/images/' . $image_new_name;
        } else {
            $food->food_image = 'food/images/default.jpg';
        }
        $food->update();

        return redirect('foods')->with('message', 'Food item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return back()->with('message', 'food item Deleted Successfully');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $foods  =  Food::where('food_name', 'LIKE', "%" . $searchTerm)->get();
        return view('user.search', compact('searchTerm', 'foods'));
    }
    public function sort(Request $request)
    {
        $foods = Food::query();
        if ($request->input('sort') == 'asc') {
            $foods->orderBy('food_price', 'asc');
        } elseif ($request->input('sort') == 'desc') {
            $foods->orderBy('food_price', 'desc');
        }
        $foods = $foods->get();
        return view('user.food', compact('foods'));
    }
}
