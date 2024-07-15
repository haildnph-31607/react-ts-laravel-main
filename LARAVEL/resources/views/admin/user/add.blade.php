@extends('admin.layout')
@section('main')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">

            <h4 class="header-title">ADD USER</h4>

            <form class="forms-sample" action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">ROLE</label>
                    <select name="role" id="" class="form-control">
                        @foreach ($role as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                        @endforeach
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputName1">NAME</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                        value="{{ old('name') }}" placeholder="Name...">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputName1">EMAIL</label>
                    <input type="text" name="email" class="form-control" id="exampleInputName1" placeholder="Email..."
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputName1"
                        placeholder="Password..." value="{{ old('password') }}">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputName1"
                        placeholder="Confirm Password..." value="{{ old('name') }}">
                </div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('user.index') }}" class="btn btn-light">Back List Coupon</a>
            </form>

        </div>
    </div>
@endsection
