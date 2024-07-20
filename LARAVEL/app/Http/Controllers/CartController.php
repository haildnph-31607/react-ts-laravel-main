<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart()
    {
        $name = $_GET['name'];
        $price = $_GET['price'];
        $image = $_GET['images'];
        $quantity = $_GET['quantitys'];
        $id_product = $_GET['productID'];
        $id_user = $_GET['user'];
        $dataColor = $_GET['dataColor'];
        $classify = $_GET['dataClassify'];

        $totalPrice = $quantity * $price;
        $Cart = new Cart();
        $Cart->classify = $classify;
        $Cart->variant = $dataColor;
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
    public function Cart($id)
    {
        if (Auth::user()) {
            $category = Category::all();
            $cart = Cart::where('id_user', $id)->get();
            $total = Cart::where('id_user', $id)->sum('total');
            $totalQuantity = Cart::where('id_user', $id)->sum('quantity');
            $carts = Cart::where('id_user', Auth::user()->id)->get();
            $title = ' Giỏ Hàng';
            return view('client.cart', compact('category', 'cart', 'total', 'totalQuantity', 'carts','title'));
        } else {
            $title = ' Giỏ Hàng';

            $category = Category::all();
            return view('auth.login', compact('category','title'));
        }
    }
    public function deleteCart()
    {
        $id = $_GET['id'];
        $item = Cart::find($id);


        if ($item) {
            $item->delete();
            $total = Cart::where('id_user', $id)->sum('total');
            return $total;
        } else {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng');
        }
    }
    public function updateCart()
    {
        $id = $_GET['id'];
        $total = $_GET['total'];
        $quantity = $_GET['quantity'];

        $cart = Cart::find($id);
        $cart->quantity = $quantity;
        $cart->total = $total;
        $cart->save();
    }
    public function getCart()
    {

        $dataColor = $_GET['dataColor'];
        $productID = $_GET['productID'];
        $classify = $_GET['dataClassify'];
        $data = Cart::where('id_product', $productID)->where('variant', $dataColor)->where('classify', $classify)->first();
        if ($data) {
            return $data;
        }
    }
    public function quantityCart()
    {

        $id = $_GET['id'];
        $quantity = $_GET['quantitysy'];
        $total = $_GET['total'];

        $cart = Cart::find($id);

        if ($cart) {
            $cart->quantity = $quantity;
            $cart->total = $total;
            $cart->save();
        }
    }
}
