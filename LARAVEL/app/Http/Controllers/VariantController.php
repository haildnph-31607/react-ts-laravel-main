<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variant = Variant::all();
        return view('admin.variant.index',compact('variant'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Variant::find($id);
        $product = Product::all();
        return view('admin.variant.update',compact('data','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data = $request->all();
       $variant = Variant::find($id);
       $variant->variant = $data['variant'];
       $variant->classify = $data['classify'];
       $variant->quantity = $data['quantity'];
       $variant->price = $data['price'];
       $file = $request->file('file');
       $path = 'uploads/variation/';
       $real_name = $data['file'];
       if($file){
        if(!empty($real_name)){
            if(file_exists('uploads/variation/'.$real_name)){
                unlink('uploads/variation/'.$real_name);
            }
        }
        $name_file = $file->getClientOriginalName();
        $name_image = current(explode('.',$name_file));
        $real_name = $name_image.'_'. rand(1,1000).'.'.$file->getClientOriginalExtension();
        $file->move($path,$real_name);
       }
       $variant->image = $real_name;
       $variant->save();
       return redirect()->route('variant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
