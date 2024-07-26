<?php

namespace App\Http\Controllers;

use App\Events\DestroyCart;
use App\Events\PaymentEvent;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MoMoController extends Controller
{


    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //check for curl error
        if ($result === false) {
            return json_encode(array('error' => curl_error($ch)));
        }
        //close connection
        curl_close($ch);
        return $result;
    }

    public function MomoService($amount,$orderId)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $redirectUrl = "http://127.0.0.1:8000/checkout-fatal/" . Auth::user()->id;
        $ipnUrl = "http://127.0.0.1:8000/checkout-fatal/" . Auth::user()->id;
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        return redirect($jsonResult['payUrl']);
    }
    public function handleReturn(Request $request)
    {
        $data = $request->all();
        $value = $data['orderId'];
        if ($data['resultCode'] == "0") {
            // dd($value);
            $dataInvoice = Invoice::where('invoice_number', $value)->first();
            //  dd($dataInvoice);
            $dataInvoice->status = 1;
            $dataInvoice->payment_method = 'Đã thanh toán qua Momo';
            $dataInvoice->save();
            $dataCustomer = Customer::where('id', $dataInvoice->customer_id)->first();
            //
            $dataCarts = Cart::where('id_user', $dataInvoice->id_user)->get();
            //
            $dataTotal = $data['amount'];
            //
            $id = $dataInvoice->id_user;
            $dataCart = $dataCarts->all();
            for ($i = 0; $i < count($dataCart); $i++) {

                $order_detail = new OrderDetail();
                $order_detail->name = $dataCart[$i]['name'];
                $order_detail->variant = $dataCart[$i]['variant'];
                $order_detail->classify = $dataCart[$i]['classify'];
                $order_detail->price = $dataCart[$i]['price'];
                $order_detail->image = $dataCart[$i]['image'];
                $order_detail->quantity = $dataCart[$i]['quantity'];
                $order_detail->total = $dataCart[$i]['total'];
                $order_detail->id_invoices = $dataInvoice->id;
                $order_detail->save();
            }
            PaymentEvent::dispatch($dataInvoice, $dataCustomer, $dataCart, $dataTotal);
            DestroyCart::dispatch($id);
            return view('client.thank');
        } else {
            $dataInvoice = Invoice::where('invoice_number', $value)->first();
            $dataInvoice->delete();
            return view('client.failer');
        }
    }
}
