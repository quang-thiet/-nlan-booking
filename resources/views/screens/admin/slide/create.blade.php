@extends('layouts.admin.master')

@section('title', 'Thêm slide')

@section('title-heading', 'Thêm slide')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('error'))
            <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
        @endif
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Thêm slide</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.slide.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Url
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('url') }}" name="url" class="form-control" placeholder="Nhập url">
                        @error('url')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="slide" accept=".png, .jpg, .jpeg, .jfif" id="customFile">
                            <label class="custom-file-label" for="customFile">Chọn tệp</label>
                        </div>
                        <div class="form-group preview-image new" style="margin-top: 10px;"></div>
                        @error('slide')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Thêm</button>
                        <a href="{{ route('admin.slide.index') }}" class="btn btn-success mr-2">Danh sách slide</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection