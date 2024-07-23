@extends('admin.layout')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">

            <h4 class="header-title">ADD BANNER</h4>

            <form class="forms-sample" action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Liên kết sản phẩm</label>
                    <select name="product" id="" class="form-control">
                        <option value="" selected>Chọn Sản Phẩm</option>
                       @foreach($product as $item)
                       <option value="{{$item->id}}">{{$item->name}}</option>

                       @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">TITLE</label>
                    <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title...">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Content</label>
                    <textarea name="editor" id="editor" cols="30" rows="10"></textarea>

                </div>
                <img src=""  alt="" id="imagePreview" width="100px">
                <div class="form-group">
                    <label for="exampleInputName1">Banner Image</label>
                    <input type="file" name="file" class="form-control" id="exampleInputName1" >
                </div>



                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('coupon.index')}}" class="btn btn-light">Back List Coupon</a>
            </form>

    </div>
    <script>
          CKEDITOR.replace('editor', {
            extraPlugins: 'image2',
            filebrowserUploadUrl: '/path/to/your/upload/script',
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</div>
@endsection
