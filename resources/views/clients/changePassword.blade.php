@extends('layouts.client')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/clients/css/profile.css')}}">
@endsection
@section('slidebar')
@endsection
@section('content')
    <div class="content">
        <section>
            <form action="{{route('home.postChangePassword')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-change_password d-block m-auto mt-5" style="width: 600px;">
                    <h3>Đổi mật khẩu</h3>
                    <div class="row">
                        <div class="change_password-item mb-3 row mt-3">
                            <label for=""  class="col-sm-4 col-form-label">Mật khẩu cũ</label>
                            <div class="col-sm-8">
                                <input type="password" name="password_old" class="form-control" id="" value="{{old('password_old')}}">
                                @error('password_old')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="change_password-item mb-3 row">
                            <label for=""  class="col-sm-4 col-form-label">Mật khẩu mới</label>
                            <div class="col-sm-8">
                                <input type="password" name="password_new" class="form-control" id="" value="{{old('password_new')}}">
                                @error('password_new')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="change_password-item mb-3 row">
                            <label for=""  class="col-sm-4 col-form-label">Nhập lại mật khẩu mới</label>
                            <div class="col-sm-8">
                                <input type="password" name="password_confirmation" class="form-control" id="" value="{{old('password_confirmation')}}">
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="{{route('home.profile')}}" class="btn btn-secondary">Hủy</a>
                            <button class="btn btn-success">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
@section('js')
    
@endsection
