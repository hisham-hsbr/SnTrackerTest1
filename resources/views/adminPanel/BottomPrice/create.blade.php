@extends('adminPanel.app')
@section('pageTitle', 'Bottom Price - Create')
@section('main-content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- @include('multiauth::message') --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Bottom Price Creation</h5>

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
                                <form role="form" action="{{route('BottomPrice.store')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="title">Code</label>
                                                    <input type="text" class="form-control" name="code" id="title" style="text-transform: uppercase" value="{{old('code')}}" placeholder="Enter Code" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="subtitle">Product Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" style="text-transform: uppercase" value="{{old('name')}}" placeholder="Enter Product Name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="title">Model</label>
                                                    <input type="text" class="form-control" name="model" id="Model" style="text-transform: uppercase" value="{{old('model')}}" placeholder="Enter Model" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                    <div class="form-group">
                                                      <label>Division</label>
                                                      <select class="form-control select2" style="width: 100%;" name="division" id="division" style="text-transform: uppercase" >
                                                        <option selected="selected">{{old('division')}}</option>
                                                        <option>ACCESSORIES</option>
                                                        <option>COMPUTER</option>
                                                        <option>COMPUTER ACCESSORIES</option>
                                                        <option>ELECTRONICS</option>
                                                        <option>LAPTOP & PC</option>
                                                        <option>LAPTOP SPARES</option>
                                                        <option>MULTIMEDIA</option>
                                                        <option>PHONES</option>
                                                        <option>SPARES</option>
                                                        <option>TABLET PC</option>
                                                      </select>
                                                    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                  <label>Brand</label>
                                                  <select class="form-control select2" style="width: 100%;" name="brand" id="brand" style="text-transform: uppercase" >
                                                    <option selected="selected">{{old('brand')}}</option>
                                                    <option>ACEMAX</option>
                                                    <option>ACER</option>
                                                    <option>ADATA</option>
                                                    <option>ALFA</option>
                                                    <option>ANKER</option>
                                                    <option>APPLE</option>
                                                    <option>ASHTONE</option>
                                                    <option>ASUS</option>
                                                    <option>ATOUCH</option>
                                                    <option>AVIROS</option>
                                                    <option>BD GROUP</option>
                                                    <option>BENQ</option>
                                                    <option>BROTHER</option>
                                                    <option>CALL TOUCH</option>
                                                    <option>CANON</option>
                                                    <option>COBY</option>
                                                    <option>DAHUA</option>
                                                    <option>DATAZONE</option>
                                                    <option>DELL</option>
                                                    <option>DIGIRICH</option>
                                                    <option>DOMESTIC TOYS</option>
                                                    <option>EPSON</option>
                                                    <option>FONECOM</option>
                                                    <option>FOXCON</option>
                                                    <option>FUJISTU</option>
                                                    <option>GENIUS</option>
                                                    <option>GTAB</option>
                                                    <option>HEATZ</option>
                                                    <option>HENZER</option>
                                                    <option>HIK VISION</option>
                                                    <option>HOCO</option>
                                                    <option>HP</option>
                                                    <option>HUAWEI</option>
                                                    <option>IDEAL</option>
                                                    <option>IMATION</option>
                                                    <option>INTERNATIONAL TOYS</option>
                                                    <option>IPAD</option>
                                                    <option>IPHONE</option>
                                                    <option>JOYROOM</option>
                                                    <option>KASPERSKY</option>
                                                    <option>KINGMAX</option>
                                                    <option>KINGSTON</option>
                                                    <option>LB LINK</option>
                                                    <option>LDNIO</option>
                                                    <option>LENOVO</option>
                                                    <option>LEXAR</option>
                                                    <option>LOGIN</option>
                                                    <option>LOGITECH</option>
                                                    <option>LOGON</option>
                                                    <option>MCAFEE</option>
                                                    <option>MEIZU</option>
                                                    <option>MI</option>
                                                    <option>MICRODIGIT</option>
                                                    <option>MICROLAB</option>
                                                    <option>MICROSOFT</option>
                                                    <option>NOKIA</option>
                                                    <option>NORTON</option>
                                                    <option>NYORK</option>
                                                    <option>OPPO</option>
                                                    <option>OTHERS</option>
                                                    <option>OVLENG</option>
                                                    <option>PANASONIC</option>
                                                    <option>PHILIPS</option>
                                                    <option>PNY</option>
                                                    <option>POWER GO</option>
                                                    <option>PRODA</option>
                                                    <option>RAVOZ</option>
                                                    <option>REMAX</option>
                                                    <option>SAMSUNG</option>
                                                    <option>SANDISK</option>
                                                    <option>SEAGATE</option>
                                                    <option>SMARTBERRY</option>
                                                    <option>SONY</option>
                                                    <option>TECNO</option>
                                                    <option>TECSA</option>
                                                    <option>TIT</option>
                                                    <option>TOSHIBA</option>
                                                    <option>TP LINK</option>
                                                    <option>VEGER</option>
                                                    <option>VIVO</option>
                                                    <option>WESTERN DIGIT</option>
                                                    <option>WINDOWS</option>
                                                    <option>WO LOGO</option>
                                                    <option>XIAOMI</option>
                                                    <option>XTREME</option>
                                                    <option>YINGEDE</option>

                                                  </select>
                                                </div>
                                        </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="fb">FB</label>
                                                    <input type="number" class="form-control" name="fb" id="fb" step="0.01" value="{{old('fb')}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="sb">SB</label>
                                                    <input type="number" class="form-control" name="sb" id="sb" step="0.01" value="{{old('sb')}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="tb">F8</label>
                                                    <input type="number" class="form-control" name="tb" id="tb" step="0.01" value="{{old('tb')}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="lb">LB</label>
                                                    <input type="number" class="form-control" name="lb" id="lb" step="0.01" value="{{old('lb')}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="rt">RT</label>
                                                    <input type="number" class="form-control" name="rt" id="rt" step="0.01" value="{{old('rt')}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                        </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="status" value="1" id="status" />
                                                    <label class="form-check-label" for="status">Active</label>
                                                </div>




                                        <div class="card-footer">
                                            @permitTo('CreateBottomPrice')
                                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                                            <button type="submit" class="btn btn-success" value="save" name="submitbutton">Submit</button>
                                            <button type="submit" class="btn btn-primary" value="save and new" name="submitbutton">Submit And Create</button>

                                            {{-- <input type="submit" class="btn btn-success" value="save and new" name="submitbutton">
                                            <input type="submit" class="btn btn-success" value="save and search" name="submitbutton">  --}}

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
