@extends('adminPanel.app')
@section('pageTitle', 'Brand')
@section('head')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminLinks/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('adminLinks/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection
@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Prodect List
                @permitTo('CreateBrand')
                <span class="float-right">
                    <a href="{{ route('brand.create') }}" class="btn btn-sm btn-success ml-1 ">New Brand</a>
                </span>
                @endpermitTo
                {{-- <span class="float-right">
                    <a href="" class="btn btn-sm btn-success toastrDefaultSuccess">New</a>
                </span> --}}
            </div>

            <div class="card-body">
                {{-- @include('multiauth::message') --}}

                <div class="col-lg-8">
                    <table id="example3" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Code#</th>
                                <th>Brand</th>
                                @permitTo('CreatedBy')
                                <th>Created By</th>
                                @endpermitTo
                                @permitTo('UpdatedBy')
                                <th>Updated By</th>
                                @endpermitTo
                                @permitTo('CreatedOn')
                                <th>Created At</th>
                                @endpermitTo
                                @permitTo('UpdatedOn')
                                <th>Updated At</th>
                                @endpermitTo
                                @permitTo('StatusBrand')
                                <th>Status</th>
                                @endpermitTo
                                @permitTo('UpdateBrand')
                                <th>Action</th>
                                @endpermitTo


                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <!-- DataTables -->
    <script src="{{ asset('adminLinks/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminLinks/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>


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
                ajax: '{!! route('get.brands') !!}',
                columns: [
                    {data: 'id',name: 'id',defaultContent: ''},
                    {data: 'code',name: 'code',defaultContent: ''},
                    {data: 'name',name: 'name',defaultContent: ''},
                    @permitTo('CreatedBy')
                    {data: 'CreatedBy',name: 'CreatedBy',defaultContent: ''},
                    @endpermitTo
                    @permitTo('UpdatedBy')
                    {data: 'UpdatedBy',name: 'UpdatedBy',defaultContent: ''},
                    @endpermitTo
                    @permitTo('CreatedOn')
                    { data: 'created_at', name: 'created_at'  ,defaultContent: ''},
                    @endpermitTo
                    @permitTo('UpdatedOn')
                    { data: 'updated_at', name: 'updated_at'  ,defaultContent: ''},
                    @endpermitTo
                    @permitTo('StatusBrand')
                    {data: 'status',name: 'status',defaultContent: ''},
                    @endpermitTo
                    @permitTo('UpdateBrand')
                    {data: 'brandEdit',name: 'brandEdit',defaultContent: ''},
                    @endpermitTo


                ]
            });
        });
    </script>
    @if (Session::has('message_store'))
        <script>
            toastr.success("{!! Session::get('message_store') !!}");
        </script>
    @endif




@endsection
