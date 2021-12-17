@extends('adminPanel.app')
@section('pageTitle', 'Branch - Edit')
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{-- @include('multiauth::message') --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Branch Edit</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a href="#" class="dropdown-item swalDefaultWarning">Setup</a>
                                        <a href="#" class="dropdown-item swalDefaultTest">Another action</a>
                                        <a href="#" class="dropdown-item toastrDefaultWarning">Something else here</a>
                                        <!-- <a class="dropdown-divider"></a> -->
                                        <a href="#" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <!-- data-card-widget="remove" -->

                                <button type="button" class="btn btn-tool">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">



                                <div class="card card-primary col-lg-12">
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                    </div>
                                    <form role="form" action="{{ route('branch.update', $Branch->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="title">Code</label>
                                                        <input type="text" class="form-control" name="code" id="title"
                                                            style="text-transform: uppercase" value="{{ $Branch->code }}"
                                                            placeholder="Enter Code" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label for="subtitle">Branch Name</label>
                                                        <input type="text" class="form-control" name="name" id="name"
                                                            style="text-transform: uppercase" value="{{ $Branch->name }}"
                                                            placeholder="Enter Branch Name" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label for="slug">Slug</label>
                                                        <input type="text" class="form-control" readonly name="slug"
                                                            id="slug" value="{{ $Branch->slug }}" placeholder="Slug" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label for="subtitle">Remarks</label>
                                                        <input type="text" class="form-control" name="body" id="body"
                                                            value="{{ $Branch->body }}" placeholder="Enter Remarks" />
                                                    </div>
                                                </div>


                                                <div class="col-lg-8">
                                                    <input type="checkbox" class="form-check-input" name="status" value="1" id="status" @if($Branch->status==1){{'checked'}} @endif />
                                                    <label class="form-check-label" for="status">Active</label>
                                                </div>


                                                <div class="card-footer">
                                                    @permitTo('UpdateBranch')
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    @endpermitTo
                                                    <a type="button" href="{{ route('branch.index') }}"
                                                        class="btn btn-warning">Back</a>
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

    <!-- Select2 -->
    <script src="/vendor/plugins/select2/js/select2.full.min.js"></script>


    <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
    <script>
        $(function() {
            CKEDITOR.replace('editor1');
            $(".textare").wysihtml5();
        })
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
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
    @if ($errors->count() > 0)
        @foreach ($errors->all() as $error)

            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif



@endsection
