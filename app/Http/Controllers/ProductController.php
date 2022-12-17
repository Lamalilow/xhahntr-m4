<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProductView()
    {
        $categories = Category::all();

        return view('products.add_product', compact('categories'));
    }

    public function addProductPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|file|mimes:jpeg,jpg,png,bmp|max:10240',
            'category_id' => 'required:not_in:0'
        ]);
        $name_photo = explode('/', $request->file('photo')->store('public'))[1];
        $data = [
            'photo' => $name_photo,
            'status_id' => 1,
        ];
        $data += $request->all();
        Product::create($data);
        return redirect()->route('admin');
    }
}
