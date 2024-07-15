@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">UPDATE ROLE</h4>

            <form class="forms-sample" action="{{ route('role.update', $detail->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="exampleInputName1">ROLE</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{ $detail->name }}">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('role.index') }}" class="btn btn-light">Back List Role</a>
            </form>

    </div>
</div>
@endsection
