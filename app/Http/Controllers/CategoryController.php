<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }
    public function create()
    {
        return view('category.createcategory');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);

        $data = new Category;
        $data->category = $request->category;
        $data->save();

        return redirect(route('index.category'))->with('message','Category Created Successfully');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.editcategory',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'category' => 'required',
        ]);
        
        $category = Category::find($id);

        $category->category = $request->category;
        $category->save();

        return redirect(route('index.category'))->with('message','Category Updated Successfully');
    }
    public function delete($id)
    {
        $category = Category::find($id)->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }
}