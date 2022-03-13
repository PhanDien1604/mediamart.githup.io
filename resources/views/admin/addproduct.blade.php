@extends('layouts.clientAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/dropzone/min/dropzone.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
<style>
    .img-main-prd {
        margin: auto;
        width: 90%;
    }
    .list-img-prd {
        background-color: #f2f2f2;
        padding: 0.2rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        min-height: 50px
    }

    .img-prd-item img{
        height: 80px;
    }
    .img-prd-item {
        position: relative;
        height: 50px;
        width: 50px;
        overflow: hidden;
        margin: 0.2rem;
    }
    .img-prd-item .progress,
    .img-prd-item .start,
    .upload-success,.upload-error{
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);

    }
    .img-prd-item .delete {
        position: absolute;
        padding: 0px;
        top: 0px;
        right: 0px;
        border-radius: 50%;
    }
    .img-prd-item .progress{
        border-radius: 1rem;
        opacity: 0;
    }
    .img-prd-item .delete {
        opacity: 0;
        transition: 0.5s;
    }
    .img-prd-item .error {

    }
    .img-prd-item:hover .delete{
        opacity: 1;
    }
    .boxhidden {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 80px;
        height: 80px;
        background-color: #1a1a1a50;
        display: none;
    }
    .upload-success,.upload-error {
        display: none;
    }
    .upload-success,.upload-error i {
        font-size: 24px;
    }
</style>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Product Add</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Hình minh họa cho sản phẩm</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="img-main-prd">
                                <img src="{{asset('assets/clients/images/image-icon.jpg')}}" alt="" style="width: 100%">
                            </div>
                            {{-- file-sub --}}
                            <div id="previews" class="list-img-prd files my-2" >
                                <div id="template" class="img-prd-item">
                                    <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                    <div class="upload-success"><i class="far fa-check-circle text-success"></i></div>
                                    <div class="upload-error"><i class="fas fa-exclamation-triangle text-danger"></i></div>
                                    {{-- <strong class="error text-danger" data-dz-errormessage></strong> --}}
                                    <div class="boxhidden"></div>
                                    <div class="progress progress-striped active w-50" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                    <button class="btn start">
                                        {{-- <i class="fas fa-upload" style="font-size: 24px; color:white"></i> --}}
                                    </button>
                                    <button data-dz-remove class="btn delete">
                                        <i class="fas fa-times text-dark" style="font-size: 20px"></i>
                                    </button>
                                </div>
                            </div>
                            {{-- end-file-sub --}}
                            {{-- fileinput --}}
                            <div id="actions" class="row">
                                <div class="col-12">
                                    <div class="btn-group w-100">
                                        <span class="btn btn-success col fileinput-button">
                                            <i class="fas fa-plus"></i>
                                            <span>Add files</span>
                                        </span>
                                        <button type="submit" class="btn btn-primary col start">
                                            <i class="fas fa-upload"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning col cancel">
                                            <i class="fas fa-times-circle"></i>
                                            <span>Cancel upload</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <div class="fileupload-process w-100">
                                        <div id="total-progress" class="progress progress-striped active mt-2" style="border-radius:1rem" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-striped animated" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                        <h3 class="card-title">Thông tin chính</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="inputName">Mã sản phẩm</label>
                                        <input type="text" id="inputName" class="form-control" placeholder="Mã sản phẩm">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="inputName">Tên sản phẩm</label>
                                        <input type="text" id="inputName" class="form-control" placeholder="Tên sản phẩm">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Tóm tắt sản phẩm</label>
                                <textarea id="inputDescription" class="form-control" rows="4" placeholder="Nội dung tóm tắt"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="inputName">Nhóm sản phẩm</label>
                                        <input type="text" id="inputName" class="form-control" placeholder="Nhóm sản phẩm">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="inputName">Số lượng</label>
                                        <input type="text" id="inputName" class="form-control" placeholder="0">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="inputName">Giá</label>
                                        <input type="text" id="inputName" class="form-control"placeholder="VNĐ">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Thông tin khuyến mại</label>
                                <input type="text" id="inputName" class="form-control" placeholder="Điền thông tin ...">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nhà cung cấp</label>
                                <input type="text" id="inputName" class="form-control" placeholder="Điền thông tin ...">
                            </div>
                            <div class="check-view d-flex justify-content-end">
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                            Giới thiệu chi tiết về sản phẩm
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <textarea id="summernote">
                            Điền nội dung bài viết...
                        </textarea>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Project" class="btn btn-success float-right">
              </div>
            </div>
          </section>

@endsection

@section('js')
<script src="{{asset('assets/admin/AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
    })
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    // upload file
    bsCustomFileInput.init();
    // Dropzone
    Dropzone.autoDiscover = false
    // Dropzone.autoProcessQueue = true

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/", // Set the url
            thumbnailWidth: null,
            thumbnailHeight: null,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.


        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                // myDropzone.enqueueFile(file)
            }
            file.previewElement.onclick = function() {
                var img = file.previewElement.querySelector("img").getAttribute("src")
                document.querySelector(".img-main-prd img").setAttribute("src",img)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        document.querySelector("#total-progress").style.opacity = "0"
        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
            // file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            file.previewElement.querySelector(".start").style.display = "none"
            file.previewElement.querySelector(".progress").style.opacity = "1"
        })
        myDropzone.on("success", function(file) {
            file.previewElement.querySelector(".upload-success").style.display = "block"
            file.previewElement.querySelector(".progress").style.display = "none"
            file.previewElement.querySelector(".boxhidden").style.display = "none"

        })
        myDropzone.on("error", function(file) {
            file.previewElement.querySelector(".upload-error").style.display = "block"
            file.previewElement.querySelector(".progress").style.display = "none"
            file.previewElement.querySelector(".boxhidden").style.display = "none"


        })
        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
        // DropzoneJS Demo Code End
</script>
@endsection
