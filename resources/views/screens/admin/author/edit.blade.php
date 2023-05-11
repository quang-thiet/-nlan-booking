@extends('layouts.admin.master')

@section('title', 'Sửa tác giả')

@section('title-heading', 'Sửa tác giả')

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
                <h3 class="card-title">Sửa tác giả</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.author.update', $author->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên tác giả
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $author->name }}" name="name" class="form-control" placeholder="Nhập tên tác giả" required>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept=".png, .jpg, .jpeg, .jfif" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Chọn tệp</label>
                        </div>
                        <div class="form-group preview-image new" style="margin-top: 10px;"></div>
                        <div class="form-group preview-image old" style="margin-top: 10px;">
                            <img src='{{ asset($author->image) }}' style='display:block;margin:10px auto;width: auto;height: 150px;object-fit:cover;border:1px solid #3699ff;border-radius:5px;'>
                        </div>
                        @error('image')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Cập nhật</button>
                        <a href="{{ route('admin.author.index') }}" class="btn btn-success mr-2">Danh sách tác giả</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection