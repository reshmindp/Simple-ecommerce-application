<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_page()
    {
        return view('product/add-product');

    }

    public function add_product()
    {
        return view();
    }
    
}
