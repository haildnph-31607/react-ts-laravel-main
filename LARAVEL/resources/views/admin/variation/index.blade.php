@extends('admin.layout')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <h4 class="m-t-0 header-title">Product</h4>
                <p class="text-muted font-14 m-b-30">

                    the Product
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($variation as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <img src="{{ asset('uploads/variation/' . $item->image) }}" alt="" width="100px">
                                </td>
                                <td>{{ $item->color->name }}</td>
                                <td>{{$item->quantity}}</td>

                                <td><a href="javascript:void(0);"
                                        onclick="event.preventDefault();
                     if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }"
                                        class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></a>

                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('variation.destroy', $item->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="{{ route('variation.edit', $item->id) }}" class="btn btn-warning"><ion-icon
                                            name="build-outline"></ion-icon></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
