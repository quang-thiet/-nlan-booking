@extends('layouts.admin.master')

@section('title', 'Thêm vé')

@section('title-heading', 'Thêm vé')

@section('content')
    <form id="add-product" method="POST" action="{{ route('admin.ticket.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @if (session()->has('error'))
                <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
            @endif
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">Thêm vé</h3>
                    </div>
                    <!--begin::Form-->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tên vé
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                placeholder="Nhập tên vé">
                            @error('name')
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
                            <label>Danh mục 
                                <span class="text-danger">*</span>
                            </label>
                            <select name="category_id" class="form-control">
                                <option value="">Chọn danh mục:</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
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
                        <div class="form-group">
                            <label>Khung giờ chiếu
                                <span class="text-danger">*</span></label>
                            <select name="times[]" id="select-times" class="form-control" multiple>
                                @foreach ($times as $time)
                                    <option value="{{ $time->id }}" {{ is_array(old('times')) && in_array($time->id, old('times')) ? 'selected' : '' }}>{{ $time->time }}</option>
                                @endforeach
                            </select>
                            @error('times')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @foreach ($types as $type)
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Giá {{ $type->name }} <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{ old('types.'.$type->id) }}" name="types[{{ $type->id }}]" placeholder="Nhập giá {{ $type->name }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @error('types')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                        <a href="{{ route('admin.ticket.index') }}"><button type="button" class="btn btn-success mr-2">Danh
                                sách vé</button></a>
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
                    <div class="card-body form-group">
                        <div class="custom-file">
                            <input type="file" id="customFile" name="thumbnail" accept=".png, .jpg, .jpeg, .jfif"
                                class="custom-file-input">
                            <label class="custom-file-label" style="overflow:hidden" for="customFile">Chọn tệp</label>
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
        $(document).ready(function() {
            CKEDITOR.replace('content')

            $('#select-times').select2({
                placeholder: 'Chọn khung giờ chiếu'
            })
        })
    </script>
@endsection
