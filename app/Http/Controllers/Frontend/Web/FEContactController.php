<?php

namespace App\Http\Controllers\Frontend\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FEContactController extends Controller
{
    public function index()
    {
        return view('web.contact');
    }
}
