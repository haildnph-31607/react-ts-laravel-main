@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">ADD COUPON</h4>

            <form class="forms-sample" action="{{route('coupon.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Sale</label>
                    <select name="sale" id="" class="form-control">
                        <option value="" selected>Chọn Types</option>
                       @foreach($type as $item)
                       <option value="{{$item->id}}">{{$item->types}}</option>

                       @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">SKU</label>
                    <input type="text" name="sku" class="form-control" id="exampleInputName1" placeholder="Sku...">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Discout</label>
                    <input type="text" name="discout" class="form-control" id="exampleInputName1" placeholder="Discout...">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Minimum</label>
                    <input type="text" name="minimum" class="form-control" id="exampleInputName1" placeholder="Minimum...">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Start</label>
                    <input type="date" name="start" class="form-control" id="exampleInputName1" placeholder="Start">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">End</label>
                    <input type="date" name="end" class="form-control" id="exampleInputName1" placeholder="End">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('coupon.index')}}" class="btn btn-light">Back List Coupon</a>
            </form>

    </div>
</div>
@endsection
