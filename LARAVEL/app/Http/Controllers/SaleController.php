<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PromotionType;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale = Sale::all();
        return view('admin.sale.index',compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = PromotionType::all();
        return view('admin.sale.add',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|exists:promotion_types,id',
            'title' => 'required|string|max:255',
            'discount' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);
        $data = $request->all();
        $sale = new Sale();
        $sale->discount = $data['discount'];
        $sale->id_types = $data['type'];
        $sale->title = $data['title'];
        $sale->start = $data['start'];
        $sale->end = $data['end'];
        $sale->save();
        return redirect()->route('sale.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = PromotionType::all();
        $sale = Sale::find($id);
        return view('admin.sale.update',compact('type','sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required|exists:promotion_types,id',
            'title' => 'required|string|max:255',
            'discount' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);
        $data = $request->all();
        $sale = Sale::find($id);
        $sale->discount = $data['discount'];
        $sale->id_types = $data['type'];
        $sale->title = $data['title'];
        $sale->start = $data['start'];
        $sale->end = $data['end'];
        $sale->save();
        return redirect()->route('sale.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
