<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $recusive;
    public $html = '<option value="">Choose Parent</selected>';


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $this->CategoryRecusives('');
        $dataHtml = $this->html;

        return view('admin.category.add', compact('dataHtml'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $category = new Category();
        $category->name = $data['name'];
        if ($data['parent_category']) {
            $category->parent_id = $data['parent_category'];
        }
        $category->slug = $data['slug'];
        $file = $request->file('file');
        $path = 'uploads/category';
        if ($file) {
            $name_file = $file->getClientOriginalName();
            $name_image = current(explode('.', $name_file));
            $new_image = $name_image . '_' . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $new_image);
            $category->image = $new_image;
        }
        $category->save();
        return redirect()->route('category.index');
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
        $data = Category::where('id',$id)->first();
        // dd($data);
        $this->CategoryRecusives($data->parent_id);
        $dataHtml = $this->html;
        // return response()->json($dataHtml);
        return view('admin.category.update', compact('data', 'dataHtml'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->all();
        // dd($data);
        $category =  Category::find($id);
        $category->name = $data['name'];
        if ($data['parent_category']) {
            $category->parent_id = $data['parent_category'];
        }
        $category->slug = $data['slug'];
        $file = $request->file('file');
        $path = 'uploads/category';
        $new_image = $data['files'];
        if ($file) {
            if ($category->image != '') {
                if (file_exists('uploads/category/' . $category->image)) {
                    unlink('uploads/category/' . $category->image);
                }
            }
            $name_file = $file->getClientOriginalName();
            $name_image = current(explode('.', $name_file));
            $new_image = $name_image . '_' . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $new_image);
            $category->image = $new_image;
        }
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $category =  Category::find($id);
        $parent = Category::where('parent_id',$category->id)->get();
        foreach ($parent as $key => $value) {
            $categoryChild = Category::find($value->id);
            if ($value->image != '') {
                if (file_exists('uploads/category/' . $value->image)) {
                    unlink('uploads/category/' . $value->image);
                }
            }
            $categoryChild->delete();
        }
        if ($category->image != '') {
            if (file_exists('uploads/category/' . $category->image)) {
                unlink('uploads/category/' . $category->image);
            }
        }
        $category->delete();
        return redirect()->route('category.index');
    }
    public function CategoryRecusives($Parent_ID,$id='', $text = '')
    {
        $category = Category::all();
        // dd($Parent_ID);
        foreach ($category as $key => $item) {
            if ($item['parent_id'] == $id) {
             if(!empty($Parent_ID) && $Parent_ID == $item['id']){
                $this->html .= "<option value='$item->id' selected>$text $item->name</option>";
             }else{
                $this->html .= "<option value='$item->id' >$text $item->name</option>";
             }
                $this->CategoryRecusives($Parent_ID,$item['id'], $text . '- ');
            }
        }
    }

}
