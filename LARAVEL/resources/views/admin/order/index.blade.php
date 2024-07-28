@extends('admin.layout')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <h4 class="m-t-0 header-title">Order</h4>
                <p class="text-muted font-14 m-b-30">

                    Order the web
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Order Code</th>
                            <th>Date</th>
                            <th>Total Quantity</th>
                            <th>Total Amount</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Order Detail</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->customer->name }}</td>
                                <td>MHD {{ $item->invoice_number }}</td>
                                <td>
                                    {{ $item->invoice_date }}
                                </td>
                                <td>
                                    {{ $item->total_amount }}
                                </td>
                                <td>
                                    {{ number_format($item->grand_total, 0, ',', '.') }} VNĐ
                                </td>
                                <td>
                                    {{ $item->discount }}
                                </td>
                                <td>
                                    <select name="" data-id="{{$item->id}}" id="ChangeStatus" class="form-control">
                                        <option value="" selected>Status</option>
                                        <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Chờ Xác Nhận
                                        </option>
                                        <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Người Bán Đang
                                            Chuẩn Bị Hàng</option>
                                        <option value="3" {{ $item->status == 3 ? 'selected' : '' }}>Đơn Hàng Đã Bàn
                                            Giao Cho Đơn Vị Vận Chuyển</option>
                                        <option value="4" {{ $item->status == 4 ? 'selected' : '' }}>Giao Hàng Thành
                                            Công</option>
                                    </select>
                                </td>
                                <td>{{ $item->payment_method }}</td>
                                <td><a href="{{ route('order.show', $item->id) }}" class="btn btn-primary">Order Detail</a>
                                </td>
                                <td>{{ $item->notes }}</td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <script type="module">
            let nodeChangeStatus = document.querySelectorAll('#ChangeStatus');
            //    console.log(node);
            for (let i = 0; i < nodeChangeStatus.length; i++) {
                nodeChangeStatus[i].addEventListener('change', function() {
                    let id = nodeChangeStatus[i].dataset.id;
                    let status = nodeChangeStatus[i].value;
                    $.ajax({
                        url: '{{ route('statusOrder') }}',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $(
                                'meta[name="csrf-token"]').attr(
                                'content')
                        },
                        data:{
                            status,
                            id
                        },
                        success:function(){
                          console.log('Update Thành Công');
                        }
                    })
                })

            }
        </script>
    </div>
@endsection
