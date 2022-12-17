<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function mainView()
    {
        $products = Product::paginate(15);

        return view('main', compact('products'));
    }
    public function cartAdd(Request $request)
    {
        $product = $request->id;
        $data = [
            'product_id' => $product,
            'user_id' => Auth::id(),
        ];
        Cart::create($data);
        return redirect()->route('cartView');
    }
}
