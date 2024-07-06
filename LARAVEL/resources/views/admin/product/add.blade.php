@extends('admin.layout')
@section('main')
    <style>
        .InputFile {

            width: 500px;
            opacity: 0
        }

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

        .classifys {
            width: 150px;
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
            border-radius: 5px;
        }

        .delete-rows {
            margin-left: 10px;
            font-size: 12px;
            width: 100px;
            height: 50px;
            border-radius: 5px;
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
                    <input type="number" min="0" class="form-control" id="exampleInputEmail3" name="price"
                        placeholder="Price Product">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" name="editor" id="editor" rows="4" placeholder="Description Product"></textarea>
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
                            <div class="row mb-3" id="originalRowClassify">
                                <input type="text" placeholder="Classify.." name="classify_variant[0][classify]"
                                    class="classify">
                                <input type="text" class="classifys" placeholder="Price..."
                                    name="classify_variant[0][price]">
                                <input type="text" placeholder="Quantity..." class="classify"
                                    name="classify_variant[0][quantity]">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-secondary appendVariant">
                            <h4 class="header-title m-t-0 text-white">Add Variant</h4>
                            <div class="row mb-3" id="cloneVariant">
                                <div class="upload-container">
                                    <input type="file" name="product_variant[0][image]" accept="image/*"
                                        class="InputFile" style="z-index: 10">
                                    <label for="">
                                        <img src="" style="z-index: 5" alt="" class="attachmentPreview"
                                            width="100px" style="border-radius:5px; ">
                                    </label>
                                </div>
                                <input type="text" placeholder="Variant..." name="product_variant[0][variant]"
                                    class="variant">
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
            document.addEventListener('DOMContentLoaded', function() {
                var classifyButton = document.getElementById('classify');
                var originalRow = document.getElementById('originalRowClassify');
                var rowIndex = 1;
                classifyButton.addEventListener('click', function() {
                    var clonedRow = originalRow.cloneNode(true);
                    var inputs = clonedRow.getElementsByTagName('input');
                    inputs[0].name = 'classify_variant[' + rowIndex + '][classify]';
                    inputs[1].name = 'classify_variant[' + rowIndex + '][price]';
                    inputs[2].name = 'classify_variant[' + rowIndex + '][quantity]';


                    rowIndex++;

                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].value = '';

                    }
                    let btnDelete = document.createElement('button');
                    btnDelete.classList.add('btn', 'btn-danger', 'delete-rows');

                    btnDelete.textContent = 'Xoá';
                    btnDelete.addEventListener('click', function() {
                        clonedRow.remove()
                    })
                    clonedRow.appendChild(btnDelete);
                    clonedRow.removeAttribute('id');
                    originalRow.parentNode.appendChild(clonedRow);
                });
            });
        </script>
        <script>
            CKEDITOR.replace('editor');
        </script>
        <script type="text/javascript">
            function changePreview(newInputFile) {
                const parentElement = newInputFile.parentElement;
                const attachPreview = parentElement.querySelector('.attachmentPreview')
                console.log(parentElement);
                var reader = new FileReader();
                reader.onload = function(e) {
                    attachPreview.src = e.target.result;
                };
                reader.readAsDataURL(newInputFile.files[0]);
            }
            document.addEventListener('DOMContentLoaded', function() {
                var variantButton = document.getElementById('variant');
                var appendVariant = document.querySelector('.appendVariant');
                var cloneVariant = document.getElementById('cloneVariant');

                variantButton.addEventListener('click', function() {
                    var clonedRow = cloneVariant.cloneNode(true);
                    var inputs = clonedRow.getElementsByTagName('input');
                    var img = clonedRow.querySelector('img');
                    var newIndex = appendVariant.getElementsByClassName('row').length;
                    inputs[0].name = 'product_variant[' + newIndex + '][image]';
                    inputs[1].name = 'product_variant[' + newIndex + '][variant]';
                    inputs[0].id = `imageUpload${newIndex}`;
                    //
                    inputs[0].value = '';
                    inputs[1].value = '';
                    img.src = '';
                    var deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Xoá';
                    deleteButton.classList.add('btn', 'btn-sm', 'btn-danger', 'delete-row');
                    deleteButton.addEventListener('click', function() {

                        clonedRow.remove();
                    });
                    clonedRow.appendChild(deleteButton);
                    appendVariant.appendChild(clonedRow);
                    checkInput();
                });
            });

            function checkInput() {
                const inputFiles = document.querySelectorAll('.InputFile');
                inputFiles.forEach(inputFile => {

                    inputFile.addEventListener('change', () => changePreview(inputFile));
                });
            }
            checkInput()
        </script>
    </div>
@endsection
