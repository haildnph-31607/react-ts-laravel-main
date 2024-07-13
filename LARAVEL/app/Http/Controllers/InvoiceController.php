<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CreateInvoice;
use App\Jobs\ProcessCOD;
use App\Jobs\ProcessVNPayPayment;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

    }
}
