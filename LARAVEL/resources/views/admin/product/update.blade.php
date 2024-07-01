@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">UPDATE PRODUCT</h4>

            <form class="forms-sample" action="{{route('product.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control form-control-lg" name="category" id="exampleFormControlSelect1">
                        <option value="" selected>Chose Category</option>
                       @foreach($category as $item)
                       <option value="{{$item->id}}" {{($item->id === $data->id_category) ? 'selected' : ''}}>{{$item->name}}</option>
                       @endforeach

                    </select>
                </div>
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control form-control-lg" name="status" id="exampleFormControlSelect1">

                        <option value="0">Hiển Thị</option>
                        <option value="1">Ẩn</option>


                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name Product</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name Product" value="{{$data->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input type="number" class="form-control" id="exampleInputEmail3" name="price" placeholder="Price Product" value="{{$data->price}}">
                </div>
                <input type="hidden" name="file" value="{{$data->image}}">
                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" id="exampleTextarea1" name="description" rows="4" placeholder="Description Product">{{$data->description}}</textarea>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h4 class="header-title m-t-0">Dropzone File Upload Image</h4>
                            <p class="text-muted font-14 m-b-10">
                                <img src="{{asset('uploads/product/'.$data->image)}}" width="100px" alt="">
                            </p>
                            <button type="button" class="btn btn-custom btn-file">
                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                <input type="file" class="btn-light" name="file" style="opacity: 0" />
                            </button>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('product.index')}}" class="btn btn-light">Back List Products</a>
            </form>

    </div>
</div>
@endsection
