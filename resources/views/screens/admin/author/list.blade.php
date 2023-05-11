@extends('layouts.admin.master')

@section('title', 'Danh sách tác giả')

@section('title-heading', 'Danh sách tác giả')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger text-center">{{ session()->get('error') }}</div>
        @endif
        <!--begin::table-->
        <a href="{{ route('admin.author.create') }}" class="btn btn-primary mr-2 mb-3">Thêm tác giả</a>
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Danh sách tác giả
                </h3></div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div class="datatable datatable-default datatable-bordered datatable-loaded">
                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                        <thead class="datatable-head">
                            <tr class="datatable-row" style="left: 0px;">
                                <th class="datatable-cell" style="width: 20%"><span>Ảnh</span></th>
                                <th class="datatable-cell" style="flex-grow:1"><span>Tên tác gỉa</span></th>
                                <th class="datatable-cell text-right" style="width: 20%"><span>Tùy chọn</span></th>
                            </tr>
                        </thead>
                        <tbody id="table-categories" class="datatable-body">
                            @foreach ($authors as $author)
                            <tr class="datatable-row" style="left: 0px;">
                                <td class="datatable-cell" style="width: 20%"><span>
                                    <img src="{{ asset($author->image) }}" style="width: 80%;aspect-ratio:1/1;object-fit:cover;display:block;margin: 0 auto">    
                                </span></td>
                                <td class="datatable-cell" style="flex-grow:1"><span class="font-weight-bold">{{ $author->name }}</span></td>
                                <td class="datatable-cell text-right" style="width: 20%">
                                    <a href="{{ route('admin.author.edit', $author->id) }}" class="btn btn-icon btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                    <form method="POST" class="d-inline" action="{{ route('admin.author.destroy', $author->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-danger btn-sm mr-2 delete-item"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $authors->render("pagination::bootstrap-5") }}
            </div>
        </div>
        <!--end::table-->
    </div>
</div>
@endsection