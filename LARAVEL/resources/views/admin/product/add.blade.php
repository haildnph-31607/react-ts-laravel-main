@extends('admin.layout')
@section('main')
    <style>
        .ipClassify {
            width: 240px;
            height: 40px;
            margin-top: 5px;
        }

        .item {
            background-color: lightgray;
            color: black;
            border-radius: 3px;
            padding: 2px 8px;
            margin: 2px;
            display: inline-flex;
            align-items: center;
        }

        .item .delete {
            cursor: pointer;
            margin-left: 5px;
            font-weight: bold;
        }

        #color-input,
        #classify-input {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

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
                @csrf

                <!-- Category -->
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control form-control-lg @error('category') is-invalid @enderror" name="category"
                        id="category">
                        <option value="" selected>Choose Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sale -->
                <div class="form-group">
                    <label for="sale">Sale</label>
                    <select class="form-control form-control-lg @error('sale') is-invalid @enderror" name="sale"
                        id="sale">
                        <option value="" selected>Choose Sale</option>
                        @foreach ($sale as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('sale')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control form-control-lg @error('status') is-invalid @enderror" name="status"
                        id="status">
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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Name Product">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" min="0" class="form-control @error('price') is-invalid @enderror"
                        id="price" name="price" placeholder="Price Product">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="editor">Other Promotions</label>
                    <textarea class="form-control" name="editor" id="editor" rows="4" placeholder="Description Product"></textarea>
                    @error('editor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="editor">Description</label>
                    <textarea class="form-control" name="editors" id="editors" rows="4" placeholder="Description Product"></textarea>
                    @error('editor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Ember Iframe Video PA</label>
                    <input type="text" class="form-control "
                        name="video" placeholder="Video PA SPHAM">

                </div>


                <div class="form-group">
                    <label for="file" class="input-group-text">Upload Image</label>
                    <input type="file" class="form-control-file form-control  @error('file') is-invalid @enderror"
                        id="file" name="file">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="thumbnail" class="input-group-text">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail[]" multiple class="form-control" />
                </div>
                <div class="mt-4">
                    <label for="color-input mb-3">Enter Variation</label> <br>
                    <input type="text" id="color-input" class="w-100 form-control" placeholder="Enter Variation" />
                    <div id="color-container"></div>

                </div>
                <div class="mt-4">
                    <label for="classify-input">Enter Classify</label><br>
                    <input type="text" id="classify-input" class="w-100 form-control" placeholder="Enter classify" />
                    <div id="classify-container"></div>
                </div>

                <div id="classify"></div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <div class="btn btn-outline-danger" id="startClassify">Tạo Biến Thể</div>
                    <a href="{{ route('product.index') }}" class="btn btn-light">Back List Products</a>
                </div>

            </form>

        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('form').addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('input').forEach(function(input) {
                    input.addEventListener('keypress', function(event) {
                        if (event.key === 'Enter') {
                            event.preventDefault();
                        }
                    });
                });
            });
        </script>
        <script>
            const variantArray = [];
            const classifyArray = [];


            const colorInput = document.getElementById('color-input');
            const classifyInput = document.getElementById('classify-input');
            const colorContainer = document.getElementById('color-container');
            const classifyContainer = document.getElementById('classify-container');

            function createItem(container, array, value) {
                const item = document.createElement('div');
                item.className = 'item';
                item.textContent = value;
                const deleteBtn = document.createElement('span');
                deleteBtn.className = 'delete';
                deleteBtn.textContent = 'x';
                deleteBtn.addEventListener('click', function() {
                    item.remove();
                    const index = array.indexOf(value);
                    if (index > -1) {
                        array.splice(index, 1);
                    }
                });
                item.appendChild(deleteBtn);
                container.appendChild(item);
            }

            colorInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const value = colorInput.value.trim();
                    if (value && !variantArray.includes(value)) {
                        variantArray.push(value); // Thêm màu vào mảng
                        createItem(colorContainer, variantArray, value); // Tạo và hiển thị item màu
                        colorInput.value = ''; // Xóa giá trị input
                    }
                }
            });

            classifyInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const value = classifyInput.value.trim();
                    if (value && !classifyArray.includes(value)) {
                        classifyArray.push(value); // Thêm phân loại vào mảng
                        createItem(classifyContainer, classifyArray, value); // Tạo và hiển thị item phân loại
                        classifyInput.value = ''; // Xóa giá trị input
                    }
                }
            });
            document.getElementById('startClassify').addEventListener('click', () => {
                let html = '';
                let index = 0;

                // Loop through capacity and color arrays
                for (let i = 0; i < variantArray.length; i++) {
                    for (let j = 0; j < classifyArray.length; j++) {
                        // Append input elements to the HTML string
                        html += `<input value='${classifyArray[j]}' placeholder='variant'  class="ipClassify" name="Variant_Classify[${index}][variant]" />
                     <input value='${variantArray[i]}' placeholder='classify'  class="ipClassify"  name="Variant_Classify[${index}][classify]"/>
                     <input type="file" name="Variant_Classify[${index}][image]" />
                     <input type="number" placeholder='Quantity' class="ipClassify" name="Variant_Classify[${index}][quantity]" />
                     <input type="number" placeholder='Price' class="ipClassify" name="Variant_Classify[${index}][price]" />
                     <br>`;
                        index++;
                    }
                }


                document.getElementById('classify').innerHTML = html;
            })
        </script>

        {{-- <script>
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
        </script> --}}
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
        {{-- <script type="text/javascript">
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
        </script> --}}
    </div>
@endsection
