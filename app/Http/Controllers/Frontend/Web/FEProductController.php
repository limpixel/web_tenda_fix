<?php

namespace App\Http\Controllers\Frontend\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FEProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('web.product', compact('product'));
    }
}
