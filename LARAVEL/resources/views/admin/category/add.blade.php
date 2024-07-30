@extends('admin.layout')
@section('main')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">

            <h4 class="header-title">ADD CATEGORY</h4>

            <form class="forms-sample" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name Category</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Name"
                        oninput="ChangeToSlug(this)" value="{{old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Slug</label>
                    <input type="text" name="slug" class="form-control" placeholder="Slug" id="convert_slug">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Parent Category</label>
                    <select name="parent_category" class="form-control">
                        {!! $dataHtml !!}
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Upload Image</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('category.index') }}" class="btn btn-light">Back List Category</a>
            </form>

        </div>
    </div>
@endsection
