@extends('layouts.admin.master')

@section('title', 'Sửa danh mục vé')

@section('title-heading', 'Sửa danh mục vé')

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
                <h3 class="card-title">Sửa danh mục vé</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.category.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên danh mục
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control" placeholder="Nhập tên danh mục">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Cập nhật</button>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-success mr-2">Danh sách danh mục</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection