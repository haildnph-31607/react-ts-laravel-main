@extends('admin.layout')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card table-responsive">
            <h4 class="m-t-0 header-title">Banner</h4>
            <p class="text-muted font-14 m-b-30">

                Banner the Web Maketing
            </p>

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>        `
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
              @foreach ($banner as $key => $item)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->content}}</td>
                <td>
                    <img width="100px" src="{{asset('uploads/banner/'.$item->image)}}" alt="">
                </td>
                <td>{{$item->product->name}}</td>
                <td><a href="javascript:void(0);"
                     onclick="event.preventDefault();
                     if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></a>

                    <form id="delete-form-{{ $item->id }}" action="{{ route('banner.destroy', $item->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="{{route('banner.edit',$item->id)}}" class="btn btn-warning"><ion-icon name="build-outline"></ion-icon></a>
                </td>

            </tr>
              @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
