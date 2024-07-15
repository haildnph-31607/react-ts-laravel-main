@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">UPDATE SALES</h4>

            <form class="forms-sample" action="{{ route('sale.update',$sale->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <!-- Type -->
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                        <option value="" selected>Select Types</option>
                        @foreach ($type as $item)
                            <option value="{{ $item->id }}" {{($item->id == $sale->id_types) ? 'selected' : ''}}> {{ $item->types }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title..." value="{{old('title',$sale->title)}}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Discount -->
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Discount..." value="{{old('discount',$sale->discount)}}">
                    @error('discount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Start Date -->
                <div class="form-group">
                    <label for="start">Start Date</label>
                    <input type="date" name="start" class="form-control @error('start') is-invalid @enderror" id="start" placeholder="Start Date" value="{{old('start')}}">
                    @error('start')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- End Date -->
                <div class="form-group">
                    <label for="end">End Date</label>
                    <input type="date" name="end" class="form-control @error('end') is-invalid @enderror" id="end" placeholder="End Date" value="{{old('end')}}">
                    @error('end')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('coupon.index') }}" class="btn btn-light">Back to Coupon List</a>
            </form>


    </div>
</div>
@endsection
