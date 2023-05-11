@extends('layouts.admin.master')

@section('title', 'Sửa slide')

@section('title-heading', 'Sửa slide')

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
                <h3 class="card-title">Sửa slide</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.slide.update', $slide->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Url
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $slide->url }}" name="url" class="form-control" placeholder="Nhập url">
                        @error('url')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="slide" accept=".png, .jpg, .jpeg, .jfif" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Chọn tệp</label>
                        </div>
                        <div class="form-group preview-image new" style="margin-top: 10px;"></div>
                        <div class="form-group preview-image old" style="margin-top: 10px;">
                            <img src='{{ asset($slide->path) }}' style='display:block;margin:10px auto;width: auto;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px;'>
                        </div>
                        @error('slide')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Cập nhật</button>
                        <a href="{{ route('admin.slide.index') }}" class="btn btn-success mr-2">Danh sách slide</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection