<?php

namespace App\Services;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MoMoService
{
    protected $endpointUrl;
    protected $partnerCode;
    protected $accessKey;
    protected $secretKey;
    public function __construct()
    {
        $this->endpointUrl = env('MOMO_ENDPOINT_URL');
        $this->partnerCode = env('MOMO_PARTNER_CODE');
        $this->accessKey = env('MOMO_ACCESS_KEY');
        $this->secretKey = env('MOMO_SECRET_KEY');
    }
    public function createPayment($orderId, $amount, $orderInfo)
    {
        // $endpoint = config('momo.endpoint');
        // $partnerCode = config('momo.partner_code');
        // $accessKey = config('momo.access_key');
        // $secretKey = config('momo.secret_key');

        $requestId = time() . "";
        $orderId = time() . "";
        $requestType = "captureMoMoWallet";
        $extraData = "";

        $rawHash = "partnerCode=" . $this->partnerCode . "&accessKey=" . $this->accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . route('momo.return') . "&notifyUrl=" . route('momo.notify') . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $this->secretKey);

        $data = [
            'partnerCode' => $this->partnerCode,
            'accessKey' => $this->accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => route('momo.return'),
            'notifyUrl' => route('momo.notify'),
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        ];

        $response = Http::post($this->endpointUrl, $data);

        return $response->json();
    }

    public function handleReturn(Request $request)
    {
        if ($request->resultCode == '0') {
            // Thanh toán thành công
            // Thêm thông tin vào hóa đơn
            $orderId = $request->orderId;
            $amount = $request->amount;

            // Tạo mới hóa đơn trong database
           $invoice = new Invoice();
           $invoice->invoice_number = $orderId;
           $invoice->grand_total = $amount;
           $invoice->customer_id = 8;
           $invoice->id_user = 1;
           $invoice->save();
           return view('client.thank');


    }
}

    public function handleNotify(Request $request)
    {

    }
}
