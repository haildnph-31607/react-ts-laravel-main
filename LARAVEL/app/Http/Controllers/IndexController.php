<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
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
        if (Auth::user()) {
            $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
            $carts = Cart::where('id_user', Auth::user()->id)->get();
            $total = Cart::where('id_user', Auth::user()->id)->sum('total');

            return view('client.home', compact('category', 'product', 'totalQuantity', 'carts', 'total'));
        }
        return view('client.home', compact('category', 'product'));
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
        $detail = Product::with('variant', 'category', 'classify')->where('id', $id)->first();
        $category = Category::all();
        // return response()->json($detail);
        $associated  = Product::where('id_category', $detail->id_category)->whereNot('id', $detail->id)->get();
        if (Auth::user()) {
            $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
            $carts = Cart::where('id_user', Auth::user()->id)->get();
            $total = Cart::where('id_user', Auth::user()->id)->sum('total');

            return view('client.detail-product', compact('category', 'detail', 'associated', 'totalQuantity', 'carts', 'total'));
        }

        return view('client.detail-product', compact('category', 'detail', 'associated'));
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
    public function AddCustomer(Request $request)
    {
        $data = $request->all();
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->address = $data['address'];
        $customer->district = $data['district'];
        $customer->conscious = $data['conscious'];
        $customer->country = $data['country'];
        $customer->postal_code = $data['code'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->id_user = $data['id'];
        $customer->save();

        // return $request->all();
    }
    public function getCustomer(Request $request)
    {
        $data = $request->all();
        $customer = Customer::where('id_user', $data['id'])->first();
        if ($customer) {
            return $customer;
        }
    }
    public function UpdateCustomer(Request $request)
    {
        $data = $request->all();
        $customer =Customer::find($data['id_cus']);
        $customer->name = $data['name'];
        $customer->address = $data['address'];
        $customer->district = $data['district'];
        $customer->conscious = $data['conscious'];
        $customer->country = $data['country'];
        $customer->postal_code = $data['code'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->id_user = $data['id'];
        $customer->save();
    }
}
