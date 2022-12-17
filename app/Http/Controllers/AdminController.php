<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminView()
    {
        $products = Product::all();
        return view('admins.adminview', compact('products'));
    }
}
