<?php

namespace App\Http\Controllers\Member\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('members.product.index', compact('products'));
    }

    public function details($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('members.product.product-details', compact('product'));
    }
}
