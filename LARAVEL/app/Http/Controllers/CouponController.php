<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function CheckCoupon()
    {
        $coupon = $_GET['value'];
        $data = Coupon::where('sku', $coupon)->where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())->first();
        if ($data) {
            $success = ' Áp dụng mã thành công !';
            $discount = $data->discount;
            return [
                'discount' => $discount,
                'success' => $success
            ];
        }
    }
    public function index()
    {
        $coupon = Coupon::all();
        return view('admin.coupon.index', compact('coupon'));
    }
    public function create()
    {
        return view('admin.coupon.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $coupon = new Coupon();
        $coupon->sku = $data['sku'];
        $coupon->discount = $data['discout'];
        $coupon->minimum = $data['minimum'];
        $coupon->start = $data['start'];
        $coupon->end = $data['end'];
        $coupon->save();
        return redirect()->route('coupon.index');
    }
    public function edit($id)
    {
        $detail = Coupon::find($id);
        return view('admin.coupon.update',compact('detail'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $coupon = Coupon::find($id);
        $coupon->sku = $data['sku'];
        $coupon->discount = $data['discout'];
        $coupon->minimum = $data['minimum'];
        $coupon->start = $data['start'];
        $coupon->end = $data['end'];
        $coupon->save();
        return redirect()->route('coupon.index');
    }
    public function destroy($id)
    {
        Coupon::find($id)->delete();
        return redirect()->route('coupon.index');

    }
}
