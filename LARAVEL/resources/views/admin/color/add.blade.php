@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">Basic form elements</h4>

            <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <select class="form-control" id="exampleSelectGender">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>File upload</label>

                    <div class="input-group col-xs-12">
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">City</label>
                    <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Textarea</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>

    </div>
</div>
@endsection
