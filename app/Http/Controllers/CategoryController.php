<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategView()
    {
        return view('categories.add_category');
    }

    public function addCategPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Category::create($request->only('name'));
        return redirect()->route('admin');
    }
}
