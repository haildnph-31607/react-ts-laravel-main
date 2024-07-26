<?php
namespace App\Providers;

use Illuminate\Support\Facades\Http;

class MomoService
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

    public function createPayment( $amount)
    {
        $requestId = time() . "";
        $requestType = "captureMoMoWallet";
        $extraData = "";

        $rawHash = "partnerCode=" . $this->partnerCode .
                   "&accessKey=" . $this->accessKey .
                   "&requestId=" . $requestId .
                   "&amount=" . $amount .
                   "&orderId=" . 'MH124' .
                   "&orderInfo=" . 'Thanh toan' .
                   "&returnUrl=" . 'http://127.0.0.1:8000/' .
                   "&notifyUrl=" . 'http://127.0.0.1:8000/' .
                   "&extraData=" . $extraData;

        $signature = hash_hmac("sha256", $rawHash, $this->secretKey);

        $data = [
            'partnerCode' => $this->partnerCode,
            'accessKey' => $this->accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => 'MH124',
            'orderInfo' => 'Thanh toan',
            'returnUrl' => 'http://127.0.0.1:8000/',
            'notifyUrl' => 'http://127.0.0.1:8000/',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        ];

        $response = Http::post($this->endpointUrl, $data);
        return $response->json();
    }
}
