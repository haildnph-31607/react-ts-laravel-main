<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variation = Variation::where('status', 0)->get();
        return view('admin.variation.index', compact('variation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::where('status', 0)->get();
        $color = Color::all();
        return view('admin.variation.add', compact('product', 'color'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $variation = new Variation();
        $variation->id_product = $data['product'];
        $variation->id_color = $data['color'];
        $variation->status = $data['status'];
        $variation->price = $data['price'];
        $variation->colorText = $data['colorText'];
        $variation->quantity = $data['quantity'];
        $file = $request->file('file');
        $path = 'uploads/variation/';
        if ($file) {
            $name_file = $file->getClientOriginalName();
            $name_image = current(explode('.', $name_file));
            $image_real = $name_image . '_' . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $image_real);
            $variation->image = $image_real;
        }
        $variation->save();
        return redirect()->route('variation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('status', 0)->get();
        $color = Color::all();
        $data = Variation::find($id);
        return view('admin.variation.update', compact('product', 'color', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $variation = Variation::find($id);
        $variation->id_product = $data['product'];
        $variation->id_color = $data['color'];
        $variation->status = $data['status'];
        $variation->price = $data['price'];
        $variation->colorText = $data['colorText'];

        $variation->quantity = $data['quantity'];
        $image_real = $data['file'];
        $file = $request->file('file');
        $path = 'uploads/variation/';
        if ($file) {
            $size = $file->getSize();
            if ($size > 0) {
                if (file_exists('uploads/variation/' . $variation->image)) {
                    unlink('uploads/variation/' . $variation->image);
                }
                $name_file = $file->getClientOriginalName();
                $name_image = current(explode('.', $name_file));
                $image_real = $name_image . '_' . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $image_real);
            }
        }
        $variation->image = $image_real;
        $variation->save();
        return redirect()->route('variation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variation = Variation::find($id);
        if (file_exists('uploads/variation/' . $variation->image)) {
            unlink('uploads/variation/' . $variation->image);
            $variation->delete();
        }
        return redirect()->route('variation.index');
    }
}
