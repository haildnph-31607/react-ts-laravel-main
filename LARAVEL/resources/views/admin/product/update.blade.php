@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">UPDATE PRODUCT</h4>

            <form class="forms-sample" action="{{route('product.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
              @method('PATCH')
                <!-- Category -->
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control form-control-lg @error('category') is-invalid @enderror" name="category" id="category">
                        <option value="" selected>Choose Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{($item->id == $data->id_category) ? 'selected' : ''}}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sale -->
                <div class="form-group">
                    <label for="sale">Sale</label>
                    <select class="form-control form-control-lg @error('sale') is-invalid @enderror" name="sale" id="sale">
                        <option value="" selected>Choose Sale</option>
                        @foreach ($sale as $item)
                            <option value="{{ $item->id }}" {{($item->id == $data->id_sales) ? 'selected' : ''}}>{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('sale')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control form-control-lg @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="0">Hiển Thị</option>
                        <option value="1">Ẩn</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Name Product -->
                <div class="form-group">
                    <label for="name">Name Product</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name Product" value="{{old('name',$data->name)}}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Price Product" value="{{old('price',$data->price)}}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                  <input type="hidden" value="{{$data->image}}" name="file">
                <!-- Description -->
                <div class="form-group">
                    <label for="editor">Other Promotions</label>
                    <textarea class="form-control" name="editor" id="editor" rows="4" placeholder="Description Product">{{$data->description}}</textarea>
                    @error('editor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="editor">Description</label>
                    <textarea class="form-control" name="editors" id="editors" rows="4" placeholder="Description Product">{{(isset($description) ? $description->content : '')}}</textarea>

                </div>
                <input type="hidden" name="idDescription" value="{{(isset($description) ? $description->id : '')}}">
                <div class="form-group">
                    <label for="name">Ember Iframe Video PA</label>
                    <input type="text" class="form-control "
                        name="video" placeholder="Video PA SPHAM" value="{{(isset($prvd) ? $prvd->content : '')}}">

                </div>
                <input type="hidden" name="idPrvd" value="{{(isset($prvd) ? $prvd->id : '')}}">
                   <img src="{{asset('uploads/product/'.$data->image)}}" width="100px" alt="">

                <div class="form-group">
                    <label for="file">Upload Image</label>
                    <input type="file" class="form-control-file form-control  @error('file') is-invalid @enderror" id="file" name="file">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('product.index')}}" class="btn btn-light">Back List Products</a>
            </form>

    </div>
    <script>
    CKEDITOR.replace('editor', {
        entities: false,
        basicEntities: false,
        extraPlugins: 'image2,uploadimage',
        filebrowserUploadUrl: '/uploads/description/',
        filebrowserUploadMethod: 'form'
    });
    </script>
        <script>
            CKEDITOR.replace('editors', {
                entities: false,
                basicEntities: false,
                extraPlugins: 'image2,uploadimage',
                filebrowserUploadUrl: '/uploads/description/',
                filebrowserUploadMethod: 'form'
            });
        </script>
</div>
@endsection
