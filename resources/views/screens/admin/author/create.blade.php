@extends('layouts.admin.master')

@section('title', 'Thêm tác giả')

@section('title-heading', 'Thêm tác giả')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('error'))
            <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
        @endif
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Thêm tác giả</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.author.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên tác giả
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Nhập tên tác giả">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" accept=".png, .jpg, .jpeg, .jfif" id="customFile">
                            <label class="custom-file-label" for="customFile">Chọn tệp</label>
                        </div>
                        <div class="form-group preview-image new" style="margin-top: 10px;"></div>
                        @error('image')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Thêm</button>
                        <a href="{{ route('admin.author.index') }}" class="btn btn-success mr-2">Danh sách tác giả</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection