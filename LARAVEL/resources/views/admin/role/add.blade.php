@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">ADD ROLE</h4>

            <form class="forms-sample" action="{{route('role.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Role</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('role.index')}}" class="btn btn-light">Back List Role</a>
            </form>

    </div>
</div>
@endsection
