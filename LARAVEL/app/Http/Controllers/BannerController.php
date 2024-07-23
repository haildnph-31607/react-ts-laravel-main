<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::all();
        return view('admin.banner.add', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $banner = new Banner();
        $banner->title = $data['title'];
        $banner->content = $data['editor'];
        if ($data['product']) {
            $banner->link = $data['product'];
        }
        $path = 'uploads/banner/';
        $file = $request->file('file');
        if($file){
          $name_file = $file->getClientOriginalName();
          $name_image = current(explode('.',$name_file));
          $real_name = $name_image .'_'. rand(1,1000).'.'.$file->getClientOriginalExtension();
          $file->move($path,$real_name);
          $banner->image = $real_name;
        }
        $banner->save();
        return redirect()->route('banner.index');

    }
    public function edit($id){
        $banner = Banner::find($id);
        $product = Product::all();
        return view('admin.banner.update',compact('product','banner'));
    }
    public function update(Request $request , $id){
        $data = $request->all();
        $banner =  Banner::find($id);
        $banner->title = $data['title'];
        $banner->content = $data['editor'];
        if ($data['product']) {
            $banner->link = $data['product'];
        }
        $path = 'uploads/banner/';
        $file = $request->file('file');
        $real_name = $data['file'];
        if($file){
            if(file_exists('uploads/banner/'.$banner->image)){
                unlink('uploads/banner/'.$banner->image);
            }
          $name_file = $file->getClientOriginalName();
          $name_image = current(explode('.',$name_file));
          $real_name = $name_image .'_'. rand(1,1000).'.'.$file->getClientOriginalExtension();
          $file->move($path,$real_name);
          $banner->image = $real_name;
        }
        $banner->save();
        return redirect()->route('banner.index');
    }
    public function destroy($id){
        $banner = Banner::find($id);
        if(file_exists('uploads/banner/'.$banner->image)){
            unlink('uploads/banner/'.$banner->image);
        }
        $banner->delete();
        return redirect()->route('banner.index');

    }
}
