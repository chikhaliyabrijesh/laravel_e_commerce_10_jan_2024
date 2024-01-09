<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function showProductImage(Request $request)
    {
        $products = Product::query();

        if ($request->has('sort') && $request->sort == 'low_to_high') {
            $products->orderBy('price', 'asc');
        }

        $products = $products->get();
        return view('welcome',compact('products'));
    }
}