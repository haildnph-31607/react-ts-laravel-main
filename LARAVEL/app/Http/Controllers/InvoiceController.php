<?php

namespace App\Http\Controllers;

use App\Events\DestroyCart;
use App\Events\PaymentEvent;
use App\Http\Controllers\Controller;
use App\Listeners\Destroy;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Providers\MomoService;
use App\Providers\VNPayService;

class InvoiceController extends Controller
{
    protected $momoService;
    protected $vnpayService;

    public function __construct(MomoService $momoService, VNPayService $vnpayService)
    {
        $this->momoService = $momoService;
        $this->vnpayService = $vnpayService;
    }
    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['paymentMethod'] == 1) {
            $orderId = time(); // Ví dụ mã đơn hàng
            $amount = $data['grand']; // Số tiền cần thanh toán

            // Xây dựng URL thanh toán VNPay
            $vnp_Url = $this->vnpayService->buildVnpUrl($orderId, $amount);

            // Redirect người dùng đến URL thanh toán VNPay
            return redirect()->to($vnp_Url);
        } else if ($data['paymentMethod'] == 2) {
            $orderId = time() . '';
            $amount = '10000';
            $orderInfo = "Thanh toán đơn hàng " . $orderId;
            $redirectUrl = route('index');
            $ipnUrl = route('checkout', Auth::user()->id);

            $response = $this->momoService->createPayment($orderId, $amount, $orderInfo, $redirectUrl, $ipnUrl);

            if (isset($response['payUrl'])) {
                return redirect($response['payUrl']);
            } else {
                return redirect()->back()->with('error', 'Lỗi khi tạo thanh toán MoMo');
            }
        } else {
            $invoices = new Invoice();
            $invoices->customer_id = $data['customer_id'];
            $invoices->invoice_number = 'MHD' . rand(1, 1000);
            $invoices->invoice_date = now();
            $invoices->total_amount = $data['total_amount'];
            $invoices->discount = $data['discounts'];
            $invoices->grand_total = $data['grand'];
            $invoices->status = 0;
            $invoices->payment_method = $data['paymentMethod'];
            $invoices->notes = $data['notes'];
            $invoices->id_user = $data['id_user'];
            $invoices->save();
            //
            $dataInvoice = Invoice::where('id', $invoices->id)->first();
            //
            $dataCustomer = Customer::where('id', $dataInvoice->customer_id)->first();
            //
            $dataCart = Cart::where('id_user', Auth::user()->id)->get();
            //
            $dataTotal = Cart::where('id_user', Auth::user()->id)->sum('total');
            //
            $id = Auth::user()->id;


            // dd($dataCart);
            DestroyCart::dispatch($id);
            PaymentEvent::dispatch($dataInvoice, $dataCustomer, $dataCart, $dataTotal);
            return redirect()->route('thank');
        }
    }
}
