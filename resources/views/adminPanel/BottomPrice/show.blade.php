@extends('adminPanel.app')
@section('pageTitle', 'Bottom Price')
@section('head')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" />
@endsection
@section('main-content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Bottom Price List
            @permitTo('CreateBottomPrice')
            <span class="float-right">
                <a href="{{route('BottomPrice.create')}}" class="btn btn-sm btn-success ml-1 ">New BottomPrice</a>
            </span>
            @endpermitTo
            @permitTo('EditBottomPrice')
            <span class="float-right">
                <a href="/admin/BottomPrice/id/edit" class="btn btn-sm btn-secondary  ml-1">Edit</a>
            </span>
            @endpermitTo
            @permitTo('ExportBottomPrice')
            <span class="float-right">
                <a href="/BottomPrice/export" class="btn btn-sm btn-primary  ml-1">Export</a>
            </span>
            @endpermitTo
            @permitTo('ImportBottomPrice')
            <span class="float-right">
                <a href="/BottomPrice/Import" class="btn btn-sm btn-info ml-1 ">Import</a>
            </span>
            @endpermitTo
        </div>
        <div class="card-body">
            @include('multiauth::message')

            <table id="example3" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        @permitTo('ReadCodeBottom')
                        <th>code#</th>
                        @endpermitTo
                        @permitTo('ReadNameBottom')
                        <th>Product</th>
                        @endpermitTo
                        @permitTo('ReadModelBottom')
                        <th>Model</th>
                        @endpermitTo
                        @permitTo('ReadDivisionBottom')
                        <th>Division</th>
                        @endpermitTo
                        @permitTo('ReadBrandBottom')
                        <th>Brand</th>
                        @endpermitTo
                        @permitTo('ReadFirstBottom')
                        <th>FB</th>
                        @endpermitTo
                        @permitTo('ReadSecondBottom')
                        <th>SB</th>
                        @endpermitTo
                        @permitTo('ReadThirdBottom')
                        <th>TB</th>
                        @endpermitTo
                        @permitTo('ReadLastBottom')
                        <th>LB</th>
                        @endpermitTo
                        @permitTo('ReadRtBottom')
                        <th>RT+VAT</th>
                        @endpermitTo
                        @permitTo('UpdateBottomPrice')
                        <th>Action</th>

                        @endpermitTo
                        <th>updated_at</th>
                        <th>Action2</th>

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
        ajax: '{!! route('get.BottomPrices') !!}',
        columns: [
            { data: 'id', name: 'id' },
            @permitTo('ReadCodeBottom')
            { data: 'code', name: 'code' },
            @endpermitTo
            @permitTo('ReadNameBottom')
            { data: 'name', name: 'name' },
            @endpermitTo
            @permitTo('ReadModelBottom')
            { data: 'model', name: 'model' },
            @endpermitTo
            @permitTo('ReadDivisionBottom')
            { data: 'division', name: 'division' },
            @endpermitTo
            @permitTo('ReadBrandBottom')
            { data: 'brand', name: 'brand' },
            @endpermitTo
            @permitTo('ReadFirstBottom')
            { data: 'fb', name: 'fb' },
            @endpermitTo
            @permitTo('ReadSecondBottom')
            { data: 'sb', name: 'sb' },
            @endpermitTo
            @permitTo('ReadThirdBottom')
            { data: 'tb', name: 'tb' },
            @endpermitTo
            @permitTo('ReadLastBottom')
            { data: 'lb', name: 'lb' },
            @endpermitTo
            @permitTo('ReadRtBottom')
            { data: 'DT_RowData.data-rt', name: 'rt' },
            @endpermitTo
            @permitTo('UpdateBottomPrice')
            { data: 'columnEdit', name: 'columnEdit' },
            // { data: 'deleteBottom', name: 'deleteBottom' },
            @endpermitTo
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action2', name: 'action2' },

        ]
    });
});
</script>
@if(Session::has('message_store'))
<script>
    toastr.success("{!!Session::get('message_store')!!}");
</script>
@endif

@if(Session::has('message_update'))
<script>
    toastr.success("{!!Session::get('message_update')!!}");
</script>
@endif

@if ($errors->count() > 0)
    @foreach ($errors->all() as $error)

    <script>
        toastr.error("{{ $error }}");
    </script>
    @endforeach
@endif

@endsection
