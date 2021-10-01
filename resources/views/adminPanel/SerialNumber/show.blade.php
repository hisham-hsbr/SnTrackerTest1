@extends('adminPanel.app')
@section('pageTitle', 'SerialNumber')
@section('head')

<!-- DataTables -->
<!-- <link rel="stylesheet" href="asset'adminLinks/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'" /> -->
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" />

<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('main-content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Serial Number List
            @permitTo('CreateSerialNumber')
            <span class="float-right">
                <a href="{{route('SerialNumber.create')}}" class="btn btn-sm btn-success ml-1">New Serial Number</a>
            </span>
            @endpermitTo
            <span class="float-right">
                <a href="/SerialNumber/export" class="btn btn-sm btn-success toastrDefaultSuccess ml-1">Export</a>
            </span>
            <span class="float-right">
                <a href="/SerialNumber/Import" class="btn btn-sm btn-success ml-1 ">Import</a>
            </span>
        </div>
        <div class="card-body">
            @include('multiauth::message')

            <table id="example3" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Invoice#</th>
                        <th>InvSup#</th>
                        <th>Product</th>
                        <th>Code</th>
                        <th>Supplier Name</th>
                        <th>Serial Number</th>
                        <th>date</th>

                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
@endsection
@section('footer')
<!-- DataTables -->
<script src="{{asset('adminLinks/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            responsive: true,
            autoWidth: false,
        });
        $("#example2").DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
    });
</script>
<script>
$(function() {
    $('#example3').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get.SerialNumbers') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'invoice', name: 'invoice' },
            { data: 'invoiceSupplier', name: 'invoiceSupplier' },
            { data: 'product', name: 'product' },
            { data: 'code', name: 'code' },
            { data: 'supplier', name: 'supplier' },
            { data: 'SerialNumber', name: 'SerialNumber' },
            { data: 'date', name: 'date'},


        ]
    });
});
</script>
@endsection
