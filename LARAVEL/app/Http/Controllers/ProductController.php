<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classify;
use App\Models\Parameter;
use App\Models\Product;
use App\Models\Prvideo;
use App\Models\Sale;
use App\Models\Thumbnail;
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
    public function getData()
    {
        $product = Product::with('category')->where('status', 0)->get();
        return $product;
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
        $datas = $data['Variant_Classify'];

        for ($i = 0; $i < count($datas); $i++) {
            $item = $datas[$i];

            $variation = new Variant();
            $variation->id_product = $product->id;
            $variation->variant = $item['classify'];
            $variation->classify = $item['variant'];
            $variation->quantity = $item['quantity'];
            $variation->price = $item['price'];

            if (isset($item['image'])) {
                $paths = 'uploads/variation/';

                $fileVR = $item['image'];
                $name_files = $fileVR->getClientOriginalName();
                $name_images = current(explode('.', $name_files));
                $new_images = $name_images . '_' . rand(1, 1000) . '.' . $fileVR->getClientOriginalExtension();

                $fileVR->move($paths, $new_images);
                $variation->image = $new_images;
            } else {

                $variation->image = 'default_image.jpg';
            }

            $variation->save();
        }
        // uploads thumbnail
        $pathThum = 'uploads/thumbnail/';
        foreach ($data['thumbnail'] as $thum) {
            $thumbnails = new Thumbnail();
            $thumbnails->id_product = $product->id;
            if ($thum) {
                $name_thum = $thum->getClientOriginalName();
                $name_image_thum = current(explode('.', $name_thum));
                $new_thum = $name_image_thum . '_' . rand(1, 1000) . '.' . $thum->getClientOriginalExtension();
                $thum->move($pathThum, $new_thum);
                $thumbnails->image = $new_thum;
            }
            $thumbnails->save();
        }
        if ($data['editors']) {
            $parameter = new Parameter();
            $parameter->id_product = $product->id;
            $parameter->content = $data['editors'];
            $parameter->save();
        }
        if ($data['video']) {
            $parameter = new Prvideo();
            $parameter->id_product = $product->id;
            $parameter->content = $data['video'];
            $parameter->save();
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
        $description = Parameter::where('id_product', $data->id)->first();
        $prvd = Prvideo::where('id_product', $data->id)->first();
        $category = Category::all();
        return view('admin.product.update', compact('data', 'category', 'sale', 'description', 'prvd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'category' => 'required|exists:categories,id',
        //     'status' => 'required|in:0,1',
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|numeric|min:0',
        //     'editor' => 'nullable|string',

        // ]);
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
        if ($data['editors']) {
            if ($data['idDescription'] != '') {
                $parameter = Parameter::find($data['idDescription']);
                $parameter->id_product = $id;
                $parameter->content = $data['editors'];
                $parameter->save();
            } else {
                $parameter = new Parameter();
                $parameter->id_product = $id;
                $parameter->content = $data['editors'];
                $parameter->save();
            }
        }

        if ($data['video']) {
            if ($data['idPrvd'] != '') {
                $parameter = Prvideo::find($data['idPrvd']);
                $parameter->id_product = $id;
                $parameter->content = $data['video'];
                $parameter->save();
            } else {
                $parameter = new Prvideo();
                $parameter->id_product = $id;
                $parameter->content = $data['video'];
                $parameter->save();
            }
        }
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
