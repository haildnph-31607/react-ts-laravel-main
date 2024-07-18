<?php
namespace App\Providers;

use Illuminate\Support\Facades\Http;

class VNPayService
{
    protected $vnp_TmnCode;
    protected $vnp_HashSecret;
    protected $vnp_Url;
    protected $vnp_Returnurl;
    protected $vnp_apiUrl;

    public function __construct()
    {
        $this->vnp_TmnCode = env('VNP_TMNCODE');
        $this->vnp_HashSecret = env('VNP_HASHSECRET');
        $this->vnp_Url = env('VNP_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
        $this->vnp_Returnurl = env('VNP_RETURNURL');
        $this->vnp_apiUrl = env('VNP_API_URL');
    }

    public function buildVnpUrl($orderId, $amount)
    {
        $vnp_TxnRef = $orderId;
        $vnp_Amount = $amount * 100; // Số tiền thanh toán (nhân với 100)

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => request()->ip(),
            "vnp_Locale" => 'vn',
            "vnp_OrderInfo" => "Thanh toan don hang #" . $vnp_TxnRef,
            "vnp_ReturnUrl" => $this->vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        ksort($inputData);
        $query = urldecode(http_build_query($inputData));
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= '&' . $key . "=" . $value;
        }
        $hashData = trim($hashData, '&');

        $vnpSecureHash = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);
        $vnp_Url = $this->vnp_Url . "?" . http_build_query($inputData) . '&vnp_SecureHashType=SHA512&vnp_SecureHash=' . $vnpSecureHash;

        return $vnp_Url;
    }

    public function verifyResponse()
    {
        $vnp_SecureHash = request()->input('vnp_SecureHash');
        $inputData = request()->all();
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);

        ksort($inputData);
        $query = urldecode(http_build_query($inputData));
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= '&' . $key . "=" . $value;
        }
        $hashData = trim($hashData, '&');

        $vnpSecureHashGenerated = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);

        return $vnp_SecureHash === $vnpSecureHashGenerated;
    }
}
