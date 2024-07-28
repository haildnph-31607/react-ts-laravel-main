<?php

namespace App\Http\Controllers;

use App\Events\DestroyCart;
use App\Events\PaymentEvent;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\OrderDetail;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VNPayController extends Controller
{
    public function VNpay_Payment($amount, $language, $vnp_IpAddr, $vnp_TxnRef)
    {
        $vnp_TmnCode = "5RWJ4H0U"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "USPLQVHYKRYZBLWMZQEKXHXNLVNNSQZB"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/checkout-fatal-vnpay/" . Auth::user()->id;
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";

        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_Amount = $amount;
        $vnp_Locale = $language;
        $vnp_BankCode = 'VNBANK';


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" =>  $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

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

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
        die();
    }
    public function handleReturn(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $value = $data['vnp_TxnRef'];
        if ($data['vnp_ResponseCode'] == 00) {
            if ($value) {
                $dataInvoice = Invoice::where('invoice_number', $value)->first();
                $dataInvoice->status = 1;
                $dataInvoice->payment_method = 'Đã thanh toán qua VNPAY';
                $dataInvoice->save();
                $dataCustomer = Customer::where('id', $dataInvoice->customer_id)->first();
                $dataCarts = Cart::where('id_user', $dataInvoice->id_user)->get();
                $dataTotal = $data['vnp_Amount'];
                $id = $dataInvoice->id_user;
                $dataCart = $dataCarts->all();
                foreach ($dataCart as $item) {
                    $variant = Variant::where('id_product', $item->id_product)->where('variant', $item->variant)->where('classify', $item->classify)->first();
                    if ($variant) {
                        $quantity = $variant->quantity - $item->quantity;
                        $variant->quantity = $quantity;
                        $variant->save();
                    }
                }
                foreach ($dataCart as $item) {
                    $order_detail = new OrderDetail();
                    $order_detail->name = $item->name;
                    $order_detail->variant = $item->variant;
                    $order_detail->classify = $item->classify;
                    $order_detail->price = $item->price;
                    $order_detail->image = $item->image;
                    $order_detail->quantity = $item->quantity;
                    $order_detail->total = $item->total;
                    $order_detail->id_invoices = $dataInvoice->id;
                    $order_detail->save();
                }
                PaymentEvent::dispatch($dataInvoice, $dataCustomer, $dataCart, $dataTotal);
                DestroyCart::dispatch($id);
                return view('client.thank');
            } else {
                return view('client.failer');
            }
        } else {
            if ($value) {
                $dataInvoice = Invoice::where('invoice_number', $value)->first();
                $dataInvoice->delete();
            }
            return view('client.failer');
        }
    }
}
