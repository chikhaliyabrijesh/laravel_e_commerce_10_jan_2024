<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::all();
        
        return view('product.index',compact('categories','subcategories','products'));
    }
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('product.createproduct',compact('categories','subcategories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'image' => 'required',
            'product_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $data = new Product;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/product_images/', $filename);
            $data->category_id = $request->category;
            $data->subcategory_id = $request->subcategory;
            $data->image = $filename;
            $data->product_name = $request->product_name;
            $data->price = $request->price;
            $data->save();
        }

        return redirect(route('index.product'))->with('message','Product Created Successfully');
    }

    public function edit($id)
    {
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $product = Product::find($id);
        return view('product.editproduct',compact('categories','subcategories','product'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'image' => 'required',
            'product_name' => 'required',
            'price' => 'required|numeric',
        ]);
        
        $product = Product::find($id);

        if($request->hasfile('image'))
        {
            $destination = 'storage/product_images/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/product_images/',$filename);
            $product->image = $filename;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->product_name = $request->product_name;
            $product->price = $request->price;
            $product->save();
        }

        return redirect(route('index.product'))->with('message','Product Updated Successfully');
    }
    public function delete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function dashboard()
    {
        $total_product = Product::count();
        $total_subcategory = Subcategory::count();
        $total_category = Category::count();
        $total_user = User::count();
        return view('dashboard', compact('total_product','total_subcategory','total_category', 'total_user'));
    }


}