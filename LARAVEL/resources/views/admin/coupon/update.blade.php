@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">UPDATE COUPON</h4>

            <form class="forms-sample" action="{{route('coupon.update',$detail->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleInputName1">Sale</label>
                    <select name="sale" id="" class="form-control">
                        <option value="" selected>Chọn Types</option>
                       @foreach($type as $item)
                       <option value="{{$item->id}}" {{($item->id == $detail->id_types) ? 'selected' : ''}}>{{$item->types}}</option>

                       @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">SKU</label>
                    <input type="text" name="sku" class="form-control" id="exampleInputName1" placeholder="Sku..." value="{{ $detail->sku }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Discout</label>
                    <input type="text" name="discout" class="form-control" id="exampleInputName1" placeholder="Discout..." value="{{ $detail->discount }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Minimum</label>
                    <input type="text" name="minimum" class="form-control" id="exampleInputName1" placeholder="Minimum..." value="{{ $detail->minimum }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Start</label>
                    <input type="date" name="start" class="form-control" id="exampleInputName1" placeholder="Start" value="{{ $detail->start }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">End</label>
                    <input type="date" name="end" class="form-control" id="exampleInputName1" placeholder="End" value="{{ $detail->end }}">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('coupon.index')}}" class="btn btn-light">Back List Coupon</a>
            </form>

    </div>
</div>
@endsection
