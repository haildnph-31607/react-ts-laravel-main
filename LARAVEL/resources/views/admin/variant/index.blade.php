@extends('admin.layout')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card table-responsive">
            <h4 class="m-t-0 header-title">Variant</h4>
            <p class="text-muted font-14 m-b-30">

                Variant the Product
            </p>

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Variant Name</th>
                    <th>Classify Name</th>
                    <th>Variant Image</th>
                    <th>Variant Quantity</th>
                    <th>Variant Price</th>
                    <th>Option</th>
                </tr>
                </thead>


                <tbody>
              @foreach ($variant as $key => $item)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->variant}}</td>
                <td>{{$item->classify}}</td>
                <td>
                    <img src="{{asset('uploads/variation/'.$item->image)}}" width="100px" alt="">
                </td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                <td>
                    <button class="btn btn-danger" disabled onclick="alert('Không thể thực hiện')"><ion-icon name="trash-outline"></ion-icon></button>
                    <a href="{{route('variant.edit',$item->id)}}" class="btn btn-warning"><ion-icon name="build-outline"></ion-icon></a>
                </td>

            </tr>
              @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
