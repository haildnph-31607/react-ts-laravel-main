<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Variant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
            $idHash = Crypt::decrypt($id);
            $category = Category::all();
            $cart = Cart::where('id_user', $idHash)->get();
            $total = Cart::where('id_user', $idHash)->sum('total');
            $totalQuantity = Cart::where('id_user', $idHash)->sum('quantity');
            $carts = Cart::where('id_user', $idHash)->get();
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
    public function checkCart(){
       $id = $_GET['checkID'];
       $variant = $_GET['checkVariant'];
       $classify = $_GET['checkClassify'];
       $data = Variant::where('id_product',$id)->where('variant',$variant)->where('classify',$classify)->first();
       if($data){
        return $data;
       }
    }
    public function checkCartDetail(){
        $id = $_GET['id_product'];
        $classify = $_GET['classify'];
        $variant = $_GET['variant'];
        $data = Variant::where('id_product',$id)->where('variant',$variant)->where('classify',$classify)->first();
        if($data){
            return $data;
           }
    }
}
