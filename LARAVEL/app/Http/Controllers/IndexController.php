<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::where('status', 0)->get();
       if(Auth::user()){
        $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
        $carts = Cart::where('id_user',Auth::user()->id)->get();
        return view('client.home',compact('category','product','totalQuantity','carts'));

       }
       return view('client.home',compact('category','product'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = Product::with('variant','category','classify')->where('id',$id)->first();
        $category = Category::all();
        // return response()->json($detail);
        $associated  = Product::where('id_category' ,$detail->id_category)->whereNot('id',$detail->id)->get();
        if(Auth::user()){
            $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
            $carts = Cart::where('id_user',Auth::user()->id)->get();
            return view('client.detail-product',compact('category','detail','associated','totalQuantity','carts'));


           }

        return view('client.detail-product',compact('category','detail','associated'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
