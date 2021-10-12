@extends('adminPanel.app')
@section('pageTitle', 'Role - Edit')
@section('head')

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />

@endsection
@section('main-content')
<div class="container">


    <div class="card">
        <div class="card-header">Edit this Role</div>

        <div class="card-body">
            <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                @csrf @method('patch')
                <div class="row">
                <div class="form-group col-lg-6">
                    <label for="role">Role Name</label>
                    <input type="text" value="{{ $role->name }}" name="name" class="form-control " id="role">
                </div>
                <div class="form-group col-lg-6">
                    <label for="role">Assign Permissions</label>

                        <div class="card-body pl-5">
                            <label><input class="form-check-input" id="checkall" type="checkbox">
                                Select All
                            </label>
                        </div>
            </div>
                {{-- <div class="form-group"> --}}

                    <div class="container">

        {{-- -----------------------------}}


        <table id="example" class="display nowrap" style="width:100%">

            <thead>
                <tr>
                    <th>id</th>
                    <th>parent</th>
                    <th>Action</th>
                    <th>Name</th>

                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $key => $value)
                @foreach($value as $permission)
                <tr>
                    <td>{{$permission->id}}</td>
                    <td>{{$key}}</td>
                    <td class=" pl-4 col-lg-2"><input type="checkbox" name="permissions[]" class="form-check-input checkitem" value="{{$permission->id}}" id="{{$permission->id}}" @if(in_array($permission->id,$role->permissions->pluck('id')->toArray()))
                        checked
                        @endif
                        value="{{$permission->id}}" id="{{$permission->id}}">
                        <!-- <input class="form-check-input" type="checkbox" checked> -->
                        {{-- <label for="{{$permission->id}}" class="form-check-label">{{$permission->name}}</label> --}}
                    </td>
                    <td><label for="{{$permission->id}}" class="form-check-label">{{$permission->name}}</label></td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>parent</th>
                    <th>Action</th>
                    <th>Name</th>
                </tr>
            </tfoot>

        </table>



        {{-- -------------------}}











                        {{-- <div class="row">
                            @foreach($permissions as $key => $value)
                            <div class="col-lg-12 mb-12">
                                <div class="card-body">
                                    <div class="card-body p-0">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="table-success w-23">{{$key}}

                                                    </th>
                                                    <th class="table-success ">
                                                        <div class="pr-2">
                                                            <input class="form-check-input" id="" type="checkbox">
                                                            <label class="form-check-label">All</label>
                                                        </div>
                                                    </th>

                                                    @foreach($value as $permission)

                                                    <th class=" pl-4 col-lg-2"><input type="checkbox" name="permissions[]" class="form-check-input checkitem" value="{{$permission->id}}" id="{{$permission->id}}" @if(in_array($permission->id,$role->permissions->pluck('id')->toArray()))
                                                        checked
                                                        @endif
                                                        value="{{$permission->id}}" id="{{$permission->id}}">
                                                        <!-- <input class="form-check-input" type="checkbox" checked> -->
                                                        <label for="{{$permission->id}}" class="form-check-label">{{$permission->name}}</label>

                                                    </th>

                                                    @endforeach

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <!-- <td></td>
                                                    <td></td> -->

                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> --}}
                    </div>
                    </div>
                    @if($role->name <>'super')
                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                        @else
                        <a type="submit" class="btn btn-primary btn-sm disabled">Change</a>
                        @endif
                        <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right ">Back</a>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection
@section('footer')
{{-- https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

{{-- <script src="{{asset('adminLinks/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> --}}
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollY": 600,
        "scrollX": true
    } );
} );
</script>




<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultTest').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

    });
</>

<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
    $("#checkall").change(function() {
        $(".checkitem").prop("checked", $(this).prop("checked"))
    })
    $(".checkitem").change(function() {
        if ($(this).prop("checked") == false) {
            $("#checkall").prop("checked", false)
        }
        if ($(".checkitem:checked").length == $(".checkitem").length) {
            $("#checkall").prop("checked", true)
        }
    })
</script>


@endsection
