<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       if(Auth::user()){
        $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
        $carts = Cart::where('id_user',Auth::user()->id)->get();
        return view('home',compact('category','totalQuantity','carts'));
       }

        $category = Category::all();
        return view('home',compact('category'));
    }
}
