@extends('layouts.admin.master')

@section('title', 'Cấu hình thông tin')

@section('title-heading', 'Cấu hình thông tin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('error'))
            <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
        @endif
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Sửa thông tin</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên trang web
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $setting->name }}" name="name" class="form-control" placeholder="Nhập tên trang web" required>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tên người tạo trang web
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $setting->author_name }}" name="author_name" class="form-control" placeholder="Nhập người tạo trang web" required>
                        @error('author_name')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $setting->phone }}" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                        @error('phone')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email
                            <span class="text-danger">*</span></label>
                        <input type="email" value="{{ $setting->email }}" name="email" class="form-control" placeholder="Nhập email" required>
                        @error('email')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Map
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $setting->map }}" name="map" class="form-control" placeholder="Nhập link embed map" required>
                        @error('map')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $setting->address }}" name="address" class="form-control" placeholder="Nhập địa chỉ" required>
                        @error('address')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo" accept=".png, .jpg, .jpeg, .jfif" id="customFile">
                            <label class="custom-file-label" for="customFile">Chọn tệp</label>
                        </div>
                        <div class="form-group preview-image new" style="margin-top: 10px;"></div>
                        <div class="form-group preview-image old" style="margin-top: 10px;">
                            <img src='{{ asset($setting->logo) }}' style='display:block;margin:10px auto;width: auto;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px;'>
                        </div>
                        @error('logo')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Cập nhật</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection