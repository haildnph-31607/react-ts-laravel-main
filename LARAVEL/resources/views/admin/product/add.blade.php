@extends('admin.layout')
@section('main')
    <style>
        .upload-container {
            position: relative;
            width: 100px;
            height: 90px;
            border: 2px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upload-label {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-direction: column;
        }

        .upload-label img {
            max-width: 90px;
            max-height: 70px;
            display: block;
        }

        .variant {
            width: 400px;
            height: 50px;
            margin-top: 20px;
            margin-left: 20px;
        }

        .classify {
            width: 400px;
            height: 50px;
            border-radius: 5px;
            border: 1px solid gainsboro;
            margin-left: 10px;
        }

        .delete-row {
            margin-left: 10px;
            padding: 5px 10px;
            font-size: 12px;
            width: 100px;
            height: 50px;
            margin-top: 20px;
        }
    </style>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">

            <h4 class="header-title">ADD PRODUCT</h4>

            <form class="forms-sample" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control form-control-lg" name="category" id="exampleFormControlSelect1">
                        <option value="" selected>Chose Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>

                @csrf

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control form-control-lg" name="status" id="exampleFormControlSelect1">

                        <option value="0">Hiển Thị</option>
                        <option value="1">Ẩn</option>


                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name Product</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name"
                        placeholder="Name Product">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input type="number" class="form-control" id="exampleInputEmail3" name="price"
                        placeholder="Price Product">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" id="exampleTextarea1" name="description" rows="4"
                        placeholder="Description Product"></textarea>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h4 class="header-title m-t-0">Dropzone File Upload Image</h4>
                            <p class="text-muted font-14 m-b-10">
                                Your awesome image goes here.
                            </p>
                            <button type="button" class="btn btn-custom btn-file">
                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                <input type="file" class="btn-light" name="file" style="opacity: 0" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-info">
                            <h4 class="header-title m-t-0">Add Classify</h4>
                            <div class="row" id="cloneRowClassify">
                                <input type="text" placeholder="Classify.." name="classify[]" class="classify"> <input
                                    type="text" placeholder="Quantity..." class="classify" name="quantity[]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-secondary appendVariant">
                            <h4 class="header-title m-t-0 text-white">Add Variant</h4>
                            <div class="row" id="cloneVariant">
                                <div class="upload-container">
                                    <input type="file" id="imageUpload" accept="image/*" hidden>
                                    <label for="imageUpload" class="upload-label">
                                        <img id="previewImage"
                                            src="https://png.pngtree.com/png-clipart/20230401/original/pngtree-cloud-uploading-line-icon-png-image_9016073.png"
                                            alt="Upload Image">

                                    </label>
                                </div>
                                <input type="text" placeholder="Variant..." name="variant[]" class="variant">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <div class="btn btn-outline-warning" id="classify">Thêm Phân Loại</div>
                <div class="btn btn-outline-danger" id="variant">Thêm Biến Thể</div>
                <a href="{{ route('product.index') }}" class="btn btn-light">Back List Products</a>

            </form>

        </div>
        <script>
            let btnPreview = document.querySelectorAll('#imageUpload');
            for (const btn of btnPreview) {
                btn.addEventListener('change', function(event) {
                    var files = event.target.files;
                    var preview = document.querySelectorAll('#previewImage');
                    for (const targert of preview) {
                        if (files.length > 0) {
                            var file = files[0];
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                targert.src = e.target.result;
                            }
                            reader.readAsDataURL(file);
                        } else {
                            targert.src =
                                'https://png.pngtree.com/png-clipart/20230401/original/pngtree-cloud-uploading-line-icon-png-image_9016073.png';
                        }
                    }

                })
            }
        </script>
        <script type="text/javascript">
            document.getElementById('variant').addEventListener('click', function() {
                var appendVariant = document.querySelector('.appendVariant');
                var cloneVariant = document.getElementById('cloneVariant').cloneNode(true);

                // Reset the values of cloned input fields
                cloneVariant.querySelector('#imageUpload').value = '';
                cloneVariant.querySelector('#previewImage').src =
                    'https://png.pngtree.com/png-clipart/20230401/original/pngtree-cloud-uploading-line-icon-png-image_9016073.png';
                cloneVariant.querySelector('.variant').value = '';

                // Add delete button to the cloned row
                var deleteButton = document.createElement('button');
                deleteButton.textContent = 'Xoá';
                deleteButton.classList.add('btn', 'btn-sm', 'btn-danger', 'delete-row');
                deleteButton.addEventListener('click', function() {
                    // Remove the entire row when delete button is clicked
                    cloneVariant.remove();
                });
                cloneVariant.appendChild(deleteButton);

                // Append cloned row to the appendVariant card
                appendVariant.appendChild(cloneVariant);
            });
        </script>
    </div>
@endsection
