<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(){
        $product= Product::all();
        // return  $product;
        // return view('product', compact('product'));
    }
}
