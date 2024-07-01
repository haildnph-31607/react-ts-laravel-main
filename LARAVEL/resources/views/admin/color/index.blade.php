@extends('admin.layout')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <h4 class="m-t-0 header-title">Color</h4>
                <p class="text-muted font-14 m-b-30">

                    Color the Product
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>

                            <th>Option</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($color as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td style="display: flex;">
                                    <form class="" action="{{ route('color.destroy', $item->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure'); e.preventDefault();"
                                            class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                    </form>
                                    <a style="margin-left: 5px" ; href="{{ route('color.edit', $item->id) }}"
                                        class="btn btn-warning "><ion-icon name="build-outline"></ion-icon></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
