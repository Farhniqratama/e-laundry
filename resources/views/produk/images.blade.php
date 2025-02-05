@extends('layouts.default')
@section('title', __( 'Produk' ))
@section('content')
<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        @include('layouts.partials.notification')
                    </div>
                </div>
                <div class="card card-bordered card-preview" style="padding: 30px;">
                    <div class="card-inner">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width:150px;" class="pl-0"><b>Nama Produk</b></td>
                                <td style="width:5px;">:</td>
                                <td>{{ $product->nama_produk }}</td>
                                <td></td>
                                <td></td>
                                <td><span><a href="#uploadModel" data-bs-toggle="modal" class="btn btn-primary" style="float: right;">Tambah Data <i class="menu-icon tf-icons bx bx-plus" style="margin-left: 5px;"></i></a></span></td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Image</th>
                                    <th>Is Thumbnail</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data AS $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('upload/produk/'.$value->gambar) }}" style="width:100px;"></td>
                                        <td>
                                            @if($value->is_thumbnails == 1)
                                                <i class="menu-icon tf-icons bx bx-check"></i> <b>Current Thumbnails</b>
                                            @else
                                                <a href="{{ URL::to('set-as-thumbnail/'.$value->id.'/'.$product->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="menu-icon tf-icons bx bx-check"></i> Set as Thumbnail
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('delete-products-images/'.$value->id.'/'.$product->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure.?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="uploadModel">    
    <div class="modal-dialog modal-dialog-centered" role="document">        
        <div class="modal-content modal-sm"> 
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">                
                <i class="menu-icon tf-icons bx bx-x" style="font-size:2.5rem;float: right;"></i>           
            </a>
            <div class="modal-body">
                <form method="POST" action="{{ URL::to('do-upload-images/'.$product->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="default-03">Images</label>
                            <input type="file" class="form-control" id="imageInput" name="images[]" required="" accept="image/*">
                        </div>
                        <div id="more_image"></div><br>
                        <div id="croppedImagePreview"></div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-warning" onclick="more_images()">Add More Image</button> --}}
                        <button type="button" class="btn btn-primary" onclick="cropAndUploadImages()">Crop and Upload</button>
                    </div>   
                </form>        
            </div>   
        </div>    
    </div>
</div>
<!-- Cropper.js CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

<!-- Cropper.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script type="text/javascript">
    let cropper;
    let imageElement = document.getElementById('imageInput');
    let croppedImages = [];
    let no = 0;

    imageElement.addEventListener('change', function(event) {
        let files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            if (file && file.type.startsWith('image/')) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let image = document.createElement('img');
                    image.src = e.target.result;
                    let imagePreviewContainer = document.createElement('div');
                    imagePreviewContainer.classList.add('image-preview');
                    imagePreviewContainer.appendChild(image);
                    document.getElementById('croppedImagePreview').appendChild(imagePreviewContainer);

                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 1,
                        scalable: true,
                        cropBoxResizable: true,
                    });
                };
                reader.readAsDataURL(file);
            }
        }
    });

    function cropAndUploadImages() {
        let formData = new FormData();
        let files = document.getElementById('imageInput').files;

        if (!cropper) {
            alert('Silakan pilih gambar untuk di-crop terlebih dahulu.');
            return;
        }

        let promises = [];

        for (let i = 0; i < files.length; i++) {
            let canvas = cropper.getCroppedCanvas();

            if (canvas) {
                let promise = new Promise(resolve => {
                    canvas.toBlob(function(blob) {
                        formData.append('cropped_images[]', blob, files[i].name);
                        resolve();
                    }, 'image/jpeg');
                });
                promises.push(promise);
            }
        }

        // Tunggu semua blob selesai dibuat
        Promise.all(promises).then(() => {
            // Tambahkan CSRF token
            formData.append('_token', '{{ csrf_token() }}');

            // Kirim data ke server
            fetch("{{ URL::to('do-upload-images/'.$product->id) }}", {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Upload gagal');
                }
                location.reload();
                return response.json();
            })
            .then(data => {
                //alert('Gambar berhasil di-upload');
                location.reload();
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
        });
    }

    function more_images() {
        var _html_image = '<div id="image-col-'+no+'"><hr>\
        <div class="form-group">\
            <label>Images (<a href="#" style="color:red;" onclick="remove_images('+no+')">remove<a>)</label>\
            <input type="file" class="form-control-file" name="images[]" required="">\
        </div></div>';
        $("#more_image").append(_html_image);
        no+=1;
    }

    function remove_images(number) {
        $("#image-col-"+number).remove();
    }
</script>
@endsection