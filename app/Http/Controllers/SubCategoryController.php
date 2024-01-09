<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('subcategory.index',compact('categories','subcategories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.createsubcategory',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
        ]);

        $data = new SubCategory;
        $data->category_id = $request->category;
        $data->subcategory = $request->subcategory;
        $data->save();

        return redirect(route('index.subcategory'))->with('message','Subcategory Created Successfully');
    }
    public function edit($id)
    {
        $categories = Category::get();
        $subcategory = SubCategory::find($id);
        return view('subcategory.editsubcategory',compact('categories','subcategory'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
        ]);
        
        $subcategory = SubCategory::find($id);

        $subcategory->category_id = $request->category;
        $subcategory->subcategory = $request->subcategory;
        $subcategory->save();

        return redirect(route('index.subcategory'))->with('message','Subcategory Updated Successfully');
    }
    public function delete($id)
    {
        $subcategory = SubCategory::find($id)->delete();
        return redirect()->back()->with('message','Subcategory Deleted Successfully');
    }
}