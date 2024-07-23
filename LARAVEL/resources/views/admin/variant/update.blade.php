@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">UPDATE VARIANT</h4>

            <form class="forms-sample" action="{{ route('variant.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="exampleInputName1">Name Product</label>
                   <select disabled name="product" class="form-control" id="">
                    @foreach ($product as $item)
                    <option value="{{$item->id}}" {{($data->id_product == $item->id) ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name Variant</label>
                    <input type="text" name="variant" placeholder="Variant..." class="form-control" value="{{$data->variant}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1"> Classify</label>
                    <input type="text" name="classify" placeholder="Classify..." class="form-control" value="{{$data->classify}}">
                </div>
                <input type="hidden" name="file" value="{{$data->image}}">
                <div class="form-group">
                    <label for="exampleInputName1">Quantity</label>
                    <input type="text" name="quantity" placeholder="Quantity..." class="form-control" value="{{$data->quantity}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Price</label>
                    <input type="text" name="price" placeholder="Price..." class="form-control" value="{{$data->price}}">
                </div>
                <div class="mt-3">
                    <img src="{{asset('uploads/variation/'.$data->image)}}" width="100px" alt="">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Uploads Image</label>
                    <input type="file" name="file" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('variant.index') }}" class="btn btn-light">Back List Variant</a>
            </form>

    </div>
</div>
@endsection
