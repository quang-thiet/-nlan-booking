@extends('layouts.admin.master')

@section('title', 'Sửa thời gian')

@section('title-heading', 'Sửa thời gian')

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
                <h3 class="card-title">Sửa thời gian</h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{ route('admin.time-slot.update', $time_slot->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Thời gian
                            <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $time_slot->time }}" name="time" class="form-control" placeholder="Nhập thời gian" required>
                        @error('time')
                            <p class="text-danger">{{$message}}</p>    
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add-category" class="btn btn-primary mr-2">Cập nhật</button>
                        <a href="{{ route('admin.time-slot.index') }}" class="btn btn-success mr-2">Danh sách</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection