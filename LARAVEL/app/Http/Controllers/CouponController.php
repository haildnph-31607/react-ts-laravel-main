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
}
