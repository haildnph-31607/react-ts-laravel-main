<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Parameter;
use App\Models\Product;
use App\Models\Prvideo;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     Session::flush();
    //     // Session::forget('idOrder');
    //    $value= Session::get('Order');
    //     dd($value);
    //    dd(Session::get('OrderRand'));
    $banner = Banner::all();

        $category = Category::all();
        $product = Product::where('status', 0)->get();
        $title = 'Trang Chủ';

        if (Auth::user()) {
            $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
            $carts = Cart::where('id_user', Auth::user()->id)->get();
            $total = Cart::where('id_user', Auth::user()->id)->sum('total');

            return view('client.home', compact('category', 'product', 'totalQuantity', 'carts', 'total', 'title','banner'));
        }
        return view('client.home', compact('category', 'product', 'title','banner'));
    }

    public function show(string $id)
    {
        $detail = Product::with('variant', 'category','thumbnail')->where('id', $id)->first();
        $description = Parameter::where('id_product',$detail->id)->first();
        $prvd = Prvideo::where('id_product',$detail->id)->first();
        $data = Coupon::where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())->where('minimum' ,'<=' ,$detail->price)->get();
        $sales = Sale::find($detail->id_sales);
        $category = Category::all();
        $title = 'Chi Tiết Sản Phẩm';

        // return response()->json($description);

        $associated  = Product::where('id_category', $detail->id_category)->whereNot('id', $detail->id)->get();
        if (Auth::user()) {
            $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
            $carts = Cart::where('id_user', Auth::user()->id)->get();
            $total = Cart::where('id_user', Auth::user()->id)->sum('total');

            return view('client.detail-product', compact('category', 'detail', 'associated', 'totalQuantity', 'carts', 'total', 'title','sales','data','description','prvd'));
        }

        return view('client.detail-product', compact('category', 'detail', 'associated', 'title','sales','data','description','prvd'));
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
        return $data;
        // $customer = Customer::find($data['id_cus']);
        // $customer->name = $data['name'];
        // $customer->address = $data['address'];
        // $customer->district = $data['district'];
        // $customer->conscious = $data['conscious'];
        // $customer->country = $data['country'];
        // $customer->postal_code = $data['code'];
        // $customer->email = $data['email'];
        // $customer->phone = $data['phone'];
        // $customer->id_user = $data['id'];
        // $customer->save();
    }
    public function ProductAll()
    {
        $title = 'Sản Phẩm';

        $category = Category::all();
        $product = Product::where('status', 0)->get();

        if (Auth::user()) {
            $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
            $carts = Cart::where('id_user', Auth::user()->id)->get();
            $total = Cart::where('id_user', Auth::user()->id)->sum('total');

            return view('client.product', compact('category', 'product', 'totalQuantity', 'carts', 'total', 'title'));
        }
        return view('client.product', compact('category', 'product', 'title'));
    }
    public function seachFullText(Request $request)
    {
        $data = $request->all();

        if($data['search-full-text'] != null){
            $search = $data['search-full-text'];
            $products = Product::all();
            $results = [];

            foreach ($products as $product) {
                if (stripos($product->name, $search) !== false) {
                    $results[] = $product;
                }
            }
            // return $results;
        }
        if($data['category'] != null){
            $results = Product::where('id_category',$data['category'])->get();
            // return $results;
        }
        $title = 'Tìm Kiếm';
        $category = Category::all();



        if (Auth::user()) {
            $totalQuantity = Cart::where('id_user', Auth::user()->id)->sum('quantity');
            $carts = Cart::where('id_user', Auth::user()->id)->get();
            $total = Cart::where('id_user', Auth::user()->id)->sum('total');

            return view('client.seach', compact('category', 'totalQuantity', 'carts', 'total', 'title', 'results'));
        }
        return view('client.seach', compact( 'data', 'title', 'category', 'results'));
        // dd($product);
    }
}
