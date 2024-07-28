@extends('admin.layout')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <h4 class="m-t-0 header-title">Order Detail</h4>
                <p class="text-muted font-14 m-b-30">

                    Order Detail the Order
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>variant</th>
                            <th>classify</th>
                            <th>Price </th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->variant }}</td>
                                <td>
                                  {{$item->classify}}
                                </td>
                                <td>
                                  {{number_format($item->price,0,',','.')}} VNĐ
                                </td>

                                  <td>
                                    <img src="{{asset('uploads/variation/'.$item->image)}}" alt="" width="100px">
                                  </td>
                                <td>
                                    {{$item->quantity}}
                                </td>
                                <td>
                                    {{number_format($item->total,0,',','.')}} VNĐ
                                  </td>



                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
