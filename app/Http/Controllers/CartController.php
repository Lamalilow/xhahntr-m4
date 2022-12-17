<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cartView()
    {
        $result = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('user_id', Auth::id())
            ->sum('products.price');
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('users.carts.cart', compact('carts', 'result'));
    }


    public function deleteCart(Request $request)
    {
        Cart::find($request->id)->delete();
        return redirect()->route('cartView');
    }
}
