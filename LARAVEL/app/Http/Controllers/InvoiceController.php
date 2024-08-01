<?php

namespace App\Http\Controllers;

use App\Events\DestroyCart;
use App\Events\HandleCallBackMomoEvent;
use App\Events\PaymentEvent;
use App\Http\Controllers\Controller;
use App\Listeners\Destroy;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VNPayController;
use App\Http\Controllers\MomoController;
use App\Models\Variant;
use App\Providers\MomoService;

class InvoiceController extends Controller
{

    protected $vnpayService;
    protected $momoService;
    // public $dataInvoice;

    public function __construct(VNPayController $vnpayService, MomoController $momoService)
    {

        $this->vnpayService = $vnpayService;
        $this->momoService = $momoService;
        // $this->dataInvoice = $dataInvoice;
    }
    public function handleStore($data, $randDomOrder)
    {

        $invoices = new Invoice();
        $invoices->customer_id = $data['customer_id'];
        $invoices->invoice_number = $randDomOrder;
        $invoices->invoice_date = now();
        $invoices->total_amount = $data['total_amount'];
        $invoices->discount = $data['discounts'];
        $invoices->grand_total = $data['grand'];
        if ($data['paymentMethod'] == 0) {
            $invoices->payment_method = 'Thanh toán qua Paypal';
        }
        $invoices->status = 0;
        $invoices->notes = $data['notes'];
        $invoices->id_user = $data['id_user'];
        $invoices->save();
        if ($data['paymentMethod'] == 0) {
            $cart = Cart::where('id_user', $data['id_user'])->get();
            foreach ($cart as $item) {
                $variant = Variant::where('id_product', $item->id_product)->where('variant', $item->variant)->where('classify', $item->classify)->first();
                if ($variant) {
                    $quantity = $variant->quantity - $item->quantity;
                    $variant->quantity = $quantity;
                    $variant->save();
                }
            }
            foreach ($cart as $item) {
                $Order = new OrderDetail();
                $Order->name = $item['name'];
                $Order->variant = $item['variant'];
                $Order->classify = $item['classify'];
                $Order->price = $item['price'];
                $Order->image = $item['image'];
                $Order->quantity = $item['quantity'];
                $Order->total = $item['total'];
                $Order->id_invoices = $invoices->id;
                $Order->save();
            }
        }

        return $invoices->id;
    }
    public function print(){
        $id = $_GET['orderId'];
     $data = Invoice::findOrFail($id);
     if($data){
        return $data;
     }
    }

    public function store(Request $request)
    {

        $data = $request->all();
        // dd($data);
        if ($data['paymentMethod'] == 1) {
            $vnp_TxnRef = rand(1,10000000);
            $this->handleStore($data,$vnp_TxnRef);

            $language = 'vn';
            $vnp_IpAddr = $request->ip();
            $amount = $data['grand'];
            return $this->vnpayService->VNpay_Payment($amount, $language, $vnp_IpAddr, $vnp_TxnRef,);
        } else if ($data['paymentMethod'] == 2) {
            $randDomOrder = rand(1, 10000);
            $amounts = $data['grand'];

            $this->handleStore($data, $randDomOrder);
            return $this->momoService->MomoService($amounts, $randDomOrder);
        } else {
            $randDomOrder = rand(1, 10000);

            $id = $this->handleStore($data, $randDomOrder);
            //
            $dataInvoice = Invoice::where('id', $id)->first();
            //
            $dataCustomer = Customer::where('id', $dataInvoice->customer_id)->first();
            //
            $dataCart = Cart::where('id_user', Auth::user()->id)->get();
            //
            $dataTotal = Cart::where('id_user', Auth::user()->id)->sum('total');
            //
            $id = Auth::user()->id;


            // dd($dataCart);

            PaymentEvent::dispatch($dataInvoice, $dataCustomer, $dataCart, $dataTotal);
            DestroyCart::dispatch($id);
            return redirect()->route('thank');
        }
    }
    public function index()
    {
        $order = Invoice::all();
        return view('admin.order.index', compact('order'));
    }
    public function show($id)
    {
        $detail = OrderDetail::where('id_invoices', $id)->get();
        return view('admin.order.detail', compact('detail'));
    }
    public function update(Request $request){
             $data = $request->all();
             $status = $data['status'];
             $id = $data['id'];
             $invoice = Invoice::find($id);
             $invoice->status = $status;
             $invoice->save();
    }
}
