@extends('layouts.client')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/clients/css/profile.css')}}">
@endsection
@section('slidebar')
@endsection
@section('content')
    <div class="content">
        <section>
            <form action="{{route('home.editProfile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-profile row mt-4 mb-5">
                    <div class="d-flex justify-content-between">
                        <h3>Hồ sơ cá nhân</h3>
                        <a href="{{route('home.changePassword')}}" class="change-password mt-2">Đổi mật khẩu</a>
                    </div>
                    <div class="profile-left col-7 mt-4" style="padding-right: 5rem">
                        <div class="profile-item mb-3 row">
                            <label for=""  class="col-sm-3 col-form-label">Tên người dùng</label>
                            <div class="col-sm-9">
                                <input type="text" disabled name="username" class="form-control" id="" value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="profile-item mb-3 row">
                            <label for=""  class="col-sm-3 col-form-label">Tài khoản</label>
                            <div class="col-sm-9">
                                <input type="text" name="account" class="form-control-plaintext" id=""value="{{$user->account}}">
                            </div>
                        </div>
                        <div class="profile-item mb-3 row">
                            <label for=""  class="col-sm-3 col-form-label">Số điện thoại</label>
                            <div class="col-sm-9">
                                <input type="text" name="tel" class="form-control" id="" value="{{$user->tel}}">
                            </div>
                        </div>
                        <div class="profile-item mb-3 row">
                            <label for=""  class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="profile-item mb-3 row">
                            <label for=""  class="col-sm-3 col-form-label">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control" id="" value="{{$user->address}}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between py-3">
                            <a href="{{route('home.profile')}}" class="btn btn-secondary">Hủy</a>
                            <button class="btn btn-success">Lưu</button>
                        </div>
                    </div>
                    <div class="profile-right col-5" style="border-left: 1px solid rgb(179, 179, 179)">
                        <div class="profile-image">
                            @if (!empty($user->path))
                                @php
                                    $img = '<img src="'.asset($user->path).'">';
                                @endphp
                                {!!$img!!}
                            @else
                                <img src="{{asset('assets/clients/images/user.png')}}" alt="">
                            @endif
                        </div>
                        <div class="img-user">
                            <input type="file" name="img_user" id="file-input" onchange="previewImg(this)" accept=".jpg,.jpeg,.png,.gif">
                            <label for="file-input" class="title-file-input d-block m-auto">
                                <div class="btn-img-user btn">Chọn</div>
                            </label>
                            <div class="dlt-img-user btn btn-secondary d-block m-auto mt-3" style="width: 50px" onclick="deleteImg(this)">Xóa</div>
                        </div>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
@section('js')
    <script>
        // ImageMain
        function previewImg(e) {
            console.log('jhgjhg')
            var fileInputMain = document.getElementById("file-input").files
                if(fileInputMain.length > 0) {
                var file_data = $(e).prop('files')[0]
                var type = file_data.type
                var fileToLoad = file_data

                var fileReade = new FileReader();
                fileReade.onload = function(fileLoadedEvent) {
                    var srcData = fileLoadedEvent.target.result;
                    $(".profile-image img").attr('src',srcData);
                    // $(".dlt-img-user").css('display',"block");
                }
                fileReade.readAsDataURL(fileToLoad);
            }
        }
        function deleteImg(e) {
            // $(".close-img-main").css('display',"none");
            $(e).parent().parent().find('img').attr('src',"{{asset('assets/clients/images/user.png')}}");
            $(e).val('')
        }
    </script>
@endsection
