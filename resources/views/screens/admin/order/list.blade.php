@extends('layouts.admin.master')

@section('title', 'Danh sách vé đã đặt')

@section('title-heading', 'Danh sách vé đã đặt')

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
                    <h3 class="card-label">Danh sách vé đã đặt
                </h3></div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div class="datatable datatable-default datatable-bordered datatable-loaded">
                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                        <thead class="datatable-head">
                            <tr class="datatable-row" style="left: 0px;">
                                <th class="datatable-cell" style="width: 20%"><span>Mã đơn hàng</span></th>
                                <th class="datatable-cell" style="width: 20%"><span>Họ tên</span></th>
                                <th class="datatable-cell" style="width: 20%"><span>Số điện thoại</span></th>
                                <th class="datatable-cell" style="flex-grow:1"><span>Thông tin</span></th>
                            </tr>
                        </thead>
                        <tbody id="table-categories" class="datatable-body">
                            @foreach ($orders as $order)
                            <tr class="datatable-row" style="left: 0px;">
                                <th class="datatable-cell" style="width: 20%"><span class="font-weight-bold">{{ $order->code }}</span></th>
                                <th class="datatable-cell" style="width: 20%"><span class="font-weight-bold">{{ $order->fullname }}</span></th>
                                <th class="datatable-cell" style="width: 20%"><span class="font-weight-bold">{{ $order->phone }}</span></th>
                                <th class="datatable-cell" style="flex-grow:1"><span class="font-weight-bold">
                                    <ul>
                                        <li>Chương trình: {{ $order->ticket->name }}</li>    
                                        @foreach (json_decode($order->detail, true) as $key => $item)
                                        <li>{{ $key }}: {{ $item }}</li>
                                        @endforeach
                                    </ul>    
                                </span></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $orders->render("pagination::bootstrap-5") }}
            </div>
        </div>
        <!--end::table-->
    </div>
</div>
@endsection