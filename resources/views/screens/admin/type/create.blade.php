@extends('layouts.admin.master')

@section('title', 'Thêm loại vé')

@section('title-heading', 'Thêm loại vé')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('error'))
            <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
        @endif
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Thêm loại vé</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.type.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên loại
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Nhập tên loại vé">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Thêm</button>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-success mr-2">Danh sách loại vé</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection