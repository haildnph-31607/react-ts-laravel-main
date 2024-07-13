<?php

namespace App\Services;

use App\Models\Invoice;
use Illuminate\Support\Facades\Http;
use App\Models\Order;

class VNPayService
{
    protected $vnpayUrl;
    protected $vnpayTmnCode;
    protected $vnpayHashSecret;

    public function __construct()
    {
        $this->vnpayUrl = config('services.vnpay.url');
        $this->vnpayTmnCode = config('services.vnpay.tmn_code');
        $this->vnpayHashSecret = config('services.vnpay.hash_secret');
    }

    public function process(Invoice $order)
    {
        // Tạo URL thanh toán VNPay và xử lý logic thanh toán
        $vnp_TxnRef = $order->id; // Mã giao dịch của bạn
        $vnp_OrderInfo = "Payment for order #" . $order->id;
        $vnp_Amount = $order->grand_total * 100; // Số tiền cần thanh toán (đơn vị VND)

        // Các tham số khác cần thiết cho VNPay
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->vnpayTmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => request()->ip(),
            "vnp_Locale" => "vn",
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        // Tạo URL thanh toán
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $this->vnpayUrl . "?" . $query;
        if (isset($this->vnpayHashSecret)) {
            $vnpSecureHash = hash('sha256', $this->vnpayHashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        // Redirect hoặc trả về URL thanh toán cho VNPay
        return redirect($vnp_Url);
    }
}
