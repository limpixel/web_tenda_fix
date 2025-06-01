<?php

namespace App\Http\Controllers\Frontend\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Dashboard\ContactModel;

class FEProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $contact = ContactModel::first(); // asumsikan hanya 1 data (seperti di database)
        return view('web.product', compact('product', 'contact'));
    }
}
