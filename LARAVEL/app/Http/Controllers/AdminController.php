<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $monthlyRevenues = Invoice::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(grand_total) as total_revenue')
        )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();


        $revenueByProduct = DB::table('order_details')
            ->select('name', DB::raw('SUM(total) as total_revenue'))
            ->groupBy('name')
            ->orderBy('total_revenue', 'desc')
            ->limit(3)
            ->get();
        $totalRevenue = Invoice::sum('grand_total');
        $totalCustomers = Customer::count();

        $topCustomer = Invoice::select('customer_id', DB::raw('SUM(grand_total) as total_spent'))
        ->groupBy('customer_id')
        ->orderBy('total_spent', 'desc')
        ->first();
        $customer = Customer::select('name')->where('id', $topCustomer->customer_id)->first();
        // return response()->json($customer);



        return view('admin.home', compact('monthlyRevenues', 'revenueByProduct','totalRevenue','totalCustomers','customer'));
    }
}
