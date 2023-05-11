@extends('layouts.admin.master')

@section('title', 'Danh sách liên hệ')

@section('title-heading', 'Danh sách liên hệ')

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
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Danh sách liên hệ
                </h3></div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div class="datatable datatable-default datatable-bordered datatable-loaded">
                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                        <thead class="datatable-head">
                            <tr class="datatable-row" style="left: 0px;">
                                <th class="datatable-cell" style="width: 33%"><span>Họ tên</span></th>
                                <th class="datatable-cell" style="width: 33%"><span>Email</span></th>
                                <th class="datatable-cell" style="width: 33%"><span>Nội dung</span></th>
                            </tr>
                        </thead>
                        <tbody id="table-categories" class="datatable-body">
                            @foreach ($contacts as $contact)
                            <tr class="datatable-row" style="left: 0px;">
                                <th class="datatable-cell" style="width: 33%"><span class="font-weight-bold">{{ $contact->fullname }}</span></th>
                                <th class="datatable-cell" style="width: 33%"><span class="font-weight-bold">{{ $contact->email }}</span></th>
                                <th class="datatable-cell" style="width: 33%"><span class="font-weight-bold">{{ $contact->message }}</span></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $contacts->render("pagination::bootstrap-5") }}
            </div>
        </div>
        <!--end::table-->
    </div>
</div>
@endsection