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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VNPayController;
use App\Http\Controllers\MomoController;
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
        $invoices->status = 0;
        $invoices->notes = $data['notes'];
        $invoices->id_user = $data['id_user'];
        $invoices->save();
        return $invoices->id;
    }

    public function store(Request $request)
    {

        $data = $request->all();
        if (isset($data['paymentMethod']) && $data['paymentMethod'] == 1) {
            $vnp_TxnRef = rand(1,10000);
            $this->handleStore($data,$vnp_TxnRef);

            $language = 'vn';
            $vnp_IpAddr = $request->ip();
            $amount = $data['grand'];
            $paymentUrl = $this->vnpayService->VNpay_Payment($amount, $language, $vnp_IpAddr,$vnp_TxnRef,);

            } else if ($data['paymentMethod'] == 2) {
                $randDomOrder = rand(1,10000);
                $amounts = $data['grand'];

                $this->handleStore($data, $randDomOrder);
                return $this->momoService->MomoService($amounts,$randDomOrder);
            } else {
                $randDomOrder = rand(1,10000);

               $id = $this->handleStore($data,$randDomOrder);
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
    }
