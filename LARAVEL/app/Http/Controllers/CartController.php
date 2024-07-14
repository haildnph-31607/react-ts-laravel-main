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
        $idClassify = $_GET['idClassify'];
        //   $totalPrice = Cart::sum('price');
        $totalPrice = $quantity * $price;
        $Cart = new Cart();
        $Cart->id_classify = $idClassify;
        $Cart->color = $dataColor;
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
            return view('client.cart', compact('category', 'cart', 'total', 'totalQuantity', 'carts'));
        } else {
            $category = Category::all();
            return view('auth.login', compact('category'));
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
        $price = $_GET['price'];
        $quantity = $_GET['quantity'];
        $total = $quantity * $price;
        $cart = Cart::find($id);
        $cart->quantity = $quantity;
        $cart->total = $total;
        $cart->save();
    }
    public function getCart()
    {
        $dataColor = $_GET['dataColor'];
        $quantityClassify = $_GET['quantityClassify'];
        $idClassify = $_GET['idClassify'];
        $data = Cart::where('id_classify', $idClassify)->where('color', $dataColor)->first();
        if ($data) {
            return $data;
        }
    }
    public function quantityCart()
    {

        $id = $_GET['id'];
        $quantity = $_GET['quantitys'];

        $cart = Cart::find($id);

        if ($cart) {
            $cart->quantity += $quantity;
            $cart->save();
        }
    }
}
