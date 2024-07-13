<?php

namespace App\Http\Controllers;

use App\Events\PaymentEvent;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
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
        $dataInvoice = Invoice::where('id',$invoices->id)->first();
        //
        $dataCustomer = Customer::where('id',$dataInvoice->customer_id)->first();
        //
        $dataCart = Cart::where('id_user',Auth::user()->id)->get();
        //
        $dataTotal = Cart::where('id_user',Auth::user()->id)->sum('total');



                // dd($dataCart);
        PaymentEvent::dispatch($dataInvoice,$dataCustomer,$dataCart,$dataTotal);

    }
}
