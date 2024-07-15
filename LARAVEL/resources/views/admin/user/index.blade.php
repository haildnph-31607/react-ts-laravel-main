@extends('admin.layout')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card table-responsive">
            <h4 class="m-t-0 header-title">User</h4>
            <p class="text-muted font-14 m-b-30">

                User the Web
            </p>

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                     <th>Option</th>
                </tr>
                </thead>


                <tbody>
              @foreach ($user as $key => $item)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role->name}}</td>

                <td><a href="javascript:void(0);"
                     onclick="event.preventDefault();
                     if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></a>

                    <form id="delete-form-{{ $item->id }}" action="{{ route('user.destroy', $item->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="{{route('user.edit',$item->id)}}" class="btn btn-warning"><ion-icon name="build-outline"></ion-icon></a>
                </td>

            </tr>
              @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
