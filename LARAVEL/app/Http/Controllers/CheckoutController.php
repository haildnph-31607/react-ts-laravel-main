<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function Checkout($id){
     $cart = Cart::where('id_user',$id)->get();
     $category = Category::all();
     $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
     $carts = Cart::where('id_user',Auth::user()->id)->get();
     $total = Cart::where('id_user', Auth::user()->id)->sum('total');

     return view('client.checkout',compact('cart','category','totalQuantity','carts','total'));
    }
}
