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
                    <a href="{{ route('brand.create') }}" class="btn btn-sm btn-success ml-1 ">New brand</a>
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
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                                <!-- <th>Serial Number</th>
                                                                                            <th>date</th> -->

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
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'CreatedBy',
                        name: 'CreatedBy'
                    },
                    {
                        data: 'UpdatedBy',
                        name: 'UpdatedBy'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'brandEdit',
                        name: 'brandEdit'
                    },
                    // { data: 'SerialNumber', name: 'SerialNumber' },
                    // { data: 'date', name: 'date' },


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
