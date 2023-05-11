@extends('layouts.admin.master')

@section('title', 'Danh sách vé')

@section('title-heading', 'Danh sách vé')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
        @endif
        <a href="{{ route('admin.ticket.create') }}" class="btn btn-primary mr-2 mb-3">Thêm vé</a>
        <!--begin::table-->
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Danh sách vé
                </h3></div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div class="datatable datatable-default datatable-bordered datatable-loaded">
                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                        <thead class="datatable-head">
                            <tr class="datatable-row" style="left: 0px;">
                                <th class="datatable-cell" style="width: 20%"><span>Ảnh</span></th>
                                <th class="datatable-cell" style="flex-grow:1"><span>Tên</span></th>
                                <th class="datatable-cell text-right" style="width: 15%"><span>Tùy chọn</span></th>
                            </tr>
                        </thead>
                        <tbody class="datatable-body">
                            @foreach ($tickets as $ticket)
                            <tr class="datatable-row" style="left: 0px;">
                                <td class="datatable-cell" style="width: 20%"><span><img src="{{ asset($ticket->thumbnail) }}" style="width:90%;object-fit:cover;display:block;margin:0 auto;aspect-ratio:1/1"></span></td>
                                <td class="datatable-cell" style="flex-grow:1"><span>{{ $ticket->name }}</span></td>
                                <td class="datatable-cell text-right" style="width: 15%">
                                    <a href="{{ route('admin.ticket.edit', $ticket->id) }}" class="btn btn-icon btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.ticket.destroy', $ticket->id) }}" method="POST" class="d-inline">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-danger delete-item"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $tickets->render("pagination::bootstrap-5") }}
            </div>
        </div>
        <!--end::table-->
    </div>
</div>
@endsection
