<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(){
      $name = $_GET['name'];
      $price = $_GET['price'];
      $image = $_GET['images'];
      $quantity = $_GET['quantitys'];
      $id_product = $_GET['productID'];
      $id_user = $_GET['user'];
    //   $totalPrice = Cart::sum('price');
      $totalPrice = $quantity * $price;
      $Cart = new Cart();
      $Cart->name = $name;
      $Cart->price = $price;
      $Cart->image = $image;
      $Cart->quantity = $quantity;
      $Cart->id_product = $id_product;
      $Cart->id_user = $id_user;
      $Cart->total = $totalPrice;
      $Cart->save();

      return true;
    }
    public function Cart($id){
        $category = Category::all();
        $cart = Cart::where('id_user',$id)->get();
        $total = Cart::sum('total');
        $totalQuantity = Cart::where('id_user', $id)->sum('quantity');
        $carts = Cart::where('id_user',Auth::user()->id)->get();
     return view('client.cart',compact('category','cart','total','totalQuantity','carts'));

    }
    public function deleteCart($id){
        Cart::find($id)->delete();
        return redirect()->back()->with('success', 'Item đã được xóa khỏi giỏ hàng');
    }
}
