@extends('adminPanel.app')
@section('pageTitle', 'Bottom Price - Import')
@section('main-content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('multiauth::message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Bottom Price Import from Excel</h5>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            @if (session()->has('failures'))
                            <table class="table table-danger">
                                <tr>
                                    <th>Row</th>
                                    <th>Attribute</th>
                                    <th>Errors</th>
                                    <th>Value</th>
                                </tr>
                                @foreach (session()->get('failures') as $validation )
                                <tr>
                                    <td>{{ $validation->row() }}</td>
                                    <td>{{ $validation->attribute() }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($validation->errors() as $e )
                                            <li>{{ $e }}</li>

                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        {{ $validation->values() [$validation->attribute()]}}
                                    </td>
                                </tr>

                                @endforeach

                            </table>

                            @endif

                            <div class="card card-primary col-lg-12">

                                <form role="form" action="/BottomPrice/import" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="card-body">

                                        <input type="file" name="file">




                                        <div class="card-footer">
                                            @permitTo('CreateBottomPrice')
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            @endpermitTo
                                            <a type="button" href="{{route('BottomPrice.index')}}" class="btn btn-warning">Back</a>
                                        </div>
                                    </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.card -->



                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

@endsection
@section('footer')

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
</script>
<script>
    $('#title').change(function() {
        $('#slug').val(slug_generator($(this).val()));
    });

    function slug_generator(data) {

        const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
        const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
        const p = new RegExp(a.split('').join('|'), 'g')
        return data.toString().toLowerCase()
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
            .replace(/&/g, '-and-') // Replace & with 'and'
            .replace(/[^\w\-]+/g, '') // Remove all non-word characters
            .replace(/\-\-+/g, '-') // Replace multiple - with single -
            .replace(/^-+/, '') // Trim - from start of text
            .replace(/-+$/, '') // Trim - from end of text
    }
</script>
@if(Session::has('message_store'))
<script>
    toastr.success("{!!Session::get('message_store')!!}");
</script>
@endif
{{-- @if ($errors->count() > 0)
    @foreach ($errors->all() as $error)

    <script>
        toastr.error("{{ $error }}");
    </script>
    @endforeach
@endif --}}



@endsection
