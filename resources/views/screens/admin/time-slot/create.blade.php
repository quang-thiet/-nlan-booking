@extends('layouts.admin.master')

@section('title', 'Thêm thời gian')

@section('title-heading', 'Thêm thời gian')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('error'))
            <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
        @endif
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Thêm thời gian</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.time-slot.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Thời gian
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('time') }}" name="time" class="form-control" placeholder="Nhập thời gian" required>
                        @error('time')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Thêm</button>
                        <a href="{{ route('admin.time-slot.index') }}" class="btn btn-success mr-2">Danh sách thời gian</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection