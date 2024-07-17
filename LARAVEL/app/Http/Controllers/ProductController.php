<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classify;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->where('status', 0)->get();
        $path = public_path() . "/public_json/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        File::put($path . "compare.json", json_encode($product));
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sale = Sale::all();
        $category = Category::all();
        return view('admin.product.add', compact('category', 'sale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->aLL());
        $request->validate([
            'category' => 'required|exists:categories,id',

            'status' => 'required|in:0,1',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'editor' => 'nullable|string',
            'file' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();
        $product = new Product();
        $product->name = $data['name'];
        $product->id_sales = $data['sale'];
        $product->price = $data['price'];
        $product->description = $data['editor'];
        $product->id_category = $data['category'];
        $product->status = $data['status'];
        $file = $request->file('file');
        $path = 'uploads/product';
        if ($file) {
            $name_file = $file->getClientOriginalName();
            $name_image = current(explode('.', $name_file));
            $new_image = $name_image . '_' . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $new_image);
            $product->image = $new_image;
        }
        $product->save();

        foreach ($data['product_variant'] as $key => $value) {
            $variant = new Variant();
            $variant->variant = $value['variant'];
            $paths = 'uploads/variation';
            $image = $value['image'];
            $name_files =  $image->getClientOriginalName();
            $name_img = current(explode('.', $name_files));
            $just_image = $name_img . '_' . rand(1, 1000) . '.' . $image->getClientOriginalExtension();
            $image->move($paths, $just_image);
            // dd($just_image);
            $variant->image = $just_image;
            $variant->id_product = $product->id;
            $variant->save();
        }

        foreach ($data['classify_variant'] as $key => $value) {
            $classify = new Classify();
            $classify->id_product = $product->id;
            $classify->classify = $value['classify'];
            $classify->price = $value['price'];
            $classify->quantity = $value['quantity'];
            $classify->save();
        }
        return redirect()->route('product.index');
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
        $sale = Sale::all();
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.product.update', compact('data', 'category', 'sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|exists:categories,id',
            'status' => 'required|in:0,1',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'editor' => 'nullable|string',
            'file' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();
        // dd($data);

        $product = Product::find($id);
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->id_sales = $data['sale'];
        $product->description = $data['editor'];
        $product->id_category = $data['category'];
        $product->status = $data['status'];
        $file = $request->file('file');
        $new_image = $data['file'];
        $path = 'uploads/product';
        if ($file) {
            $size = $file->getSize();
            if ($size > 0) {
                if (file_exists('uploads/product/' . $product->image)) {
                    unlink('uploads/product/' . $product->image);
                }
                $name_file = $file->getClientOriginalName();
                $name_image = current(explode('.', $name_file));
                $new_image = $name_image . '_' . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $new_image);
            }
        }

        $product->image = $new_image;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =  Product::find($id);
        if (file_exists('uploads/product/' . $product->image)) {
            unlink('uploads/product/' . $product->image);
        }
        $product->delete();

        return redirect()->route('product.index');
    }
}
