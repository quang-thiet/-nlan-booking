@extends('layouts.admin.master')

@section('title', 'Thêm bài viết')

@section('title-heading', 'Thêm bài viết')

@section('content')
<form id="add-product" method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">Thêm bài viết</h3>
                </div>
                <!--begin::Form-->
                <div class="card-body">
                    <div class="form-group">
                        <label>Tiêu đề
                            <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Nhập tiêu đề bài viết">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mô tả ngắn
                            <span class="text-danger">*</span></label>
                            <textarea name="description" rows="4" class="form-control" placeholder="Nhập mô tả ngắn">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Nội dung
                            <span class="text-danger">*</span></label>
                        <textarea name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                    <a href="{{ route('admin.post.index') }}"><button type="button" class="btn btn-success mr-2">Danh sách bài viết</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="far fa-image text-primary"></i>
                        </span>
                        <h3 class="card-label">Ảnh đại diện</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="custom-file">
                        <input type="file" id="customFile" name="thumbnail" accept=".png, .jpg, .jpeg, .jfif" class="custom-file-input">
                        <label class="custom-file-label" style="overflow:hidden" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group preview-image new" style="margin-top: 10px;"></div>
                    @error('thumbnail')
                            <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('custom-js-tag')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace( 'content' )
    })
</script>
@endsection