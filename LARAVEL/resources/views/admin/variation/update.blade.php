@extends('admin.layout')
@section('main')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <h4 class="header-title">UPDATE VARIATION</h4>
            <form class="forms-sample" action="{{ route('variation.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Product</label>
                    <select class="form-control form-control-lg" name="product" id="exampleFormControlSelect1">
                        <option value="" selected>Chose Product</option>
                        @foreach ($product as $item)
                            <option value="{{ $item->id }}" {{($item->id === $data->id_product) ? 'selected' : ''}}>{{ $item->name }}</option>
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
                    <label for="">Color</label>
                    <select class="form-control form-control-lg" onchange="DataInput()" name="color" id="exampleFormControlSelect">
                        <option value="" selected>Chose Color</option>
                        @foreach ($color as $item)
                            <option data-text="{{$item->name}}" value="{{ $item->id }}" {{($item->id === $data->id_color) ? 'selected' : ''}}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input type="number" class="form-control" id="exampleInputEmail3" name="price"
                        placeholder="Price Product" value="{{$data->price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Quantity</label>
                    <input type="number" class="form-control" id="exampleInputEmail3" name="quantity"
                        placeholder="Quantity Product"  value="{{$data->quantity}}">
                </div>
                <input type="hidden" name="file"  value="{{$data->image}}">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h4 class="header-title m-t-0">Dropzone File Upload Image</h4>
                            <p class="text-muted font-14 m-b-10">
                                <img src="{{asset('uploads/variation/'.$data->image)}}" width="100px" alt="">
                            </p>
                            <button type="button" class="btn btn-custom btn-file">
                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                <input type="file" class="btn-light" name="file" style="opacity: 0" />
                            </button>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="colorInput" name="colorText" value="{{$data->colorText}}">

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('variation.index') }}" class="btn btn-light">Back List Variation</a>
            </form>

        </div>
        <script type="text/javascript">
            function DataInput() {
                let colorInput = document.getElementById('colorInput');
                const selectElement = document.getElementById('exampleFormControlSelect');
                const selectedOption = selectElement.options[selectElement.selectedIndex];
                const dataText = selectedOption.getAttribute('data-text');

                colorInput.value = dataText;


            }
        </script>
    </div>
@endsection
