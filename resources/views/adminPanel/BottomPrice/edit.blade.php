@extends('adminPanel.app')
@section('pageTitle', 'Bottom Price - Edit')
@section('main-content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- @include('multiauth::message') --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Bottom Price Edit</h5>

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
                                <form role="form" action="{{route('BottomPrice.update',$BottomPrice->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="title">Code</label>
                                                    <input type="text" class="form-control" name="code" id="title" style="text-transform: uppercase" value="{{$BottomPrice->code}}" placeholder="Enter Code" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="subtitle">Product Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" style="text-transform: uppercase" value="{{$BottomPrice->name}}" placeholder="Enter Product Name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="title">Model</label>
                                                    <input type="text" class="form-control" name="model" id="model" style="text-transform: uppercase" value="{{$BottomPrice->model}}" placeholder="Enter Model" />
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                  <label>Division</label>
                                                  <select class="form-control select2" style="width: 100%;" name="division" id="division" style="text-transform: uppercase" >
                                                    {{-- <option selected="selected">{{old('division')}}</option> --}}
                                                    <option value="{{$BottomPrice->divisions->id}}" selected="selected">{{strtoupper($BottomPrice->divisions->name)}}</option>
                                                    @foreach($Divisions as $Division)
                                                    <option value="{{$Division->id}}">{{strtoupper($Division->name)}}</option>
                                                    @endforeach

                                                  </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                  <label>Brand</label>
                                                  <select class="form-control select2" style="width: 100%;" name="brand" id="brand" style="text-transform: uppercase" >
                                                    {{-- <option selected="selected">{{old('brand')}}</option> --}}
                                                    <option value="{{$BottomPrice->brands->id}}" selected="selected">{{strtoupper($BottomPrice->brands->name)}}</option>
                                                    @foreach($Brands as $Brand)
                                                    <option value="{{$Brand->id}}">{{strtoupper($Brand->name)}}</option>
                                                    @endforeach

                                                  </select>
                                                </div>
                                            </div>


                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="fb">FB</label>
                                                    <input type="number" class="form-control" name="fb" id="fb" step="0.01" value="{{$BottomPrice->fb}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="sb">SB</label>
                                                    <input type="number" class="form-control" name="sb" id="sb" step="0.01" value="{{$BottomPrice->sb}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="tb">F8</label>
                                                    <input type="number" class="form-control" name="tb" id="tb" step="0.01" value="{{$BottomPrice->tb}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="lb">LB</label>
                                                    <input type="number" class="form-control" name="lb" id="lb" step="0.01" value="{{$BottomPrice->lb}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="rt">RT</label>
                                                    <input type="number" class="form-control" name="rt" id="rt" step="0.01" value="{{$BottomPrice->rt}}" placeholder="0.00" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="status" value="1" id="status" @if($BottomPrice->status==1){{'checked'}} @endif />
                                            <label class="form-check-label" for="status">Active</label>
                                        </div>




                                        <div class="card-footer">
                                            @permitTo('UpdateBottomPrice')
                                            <button type="submit" class="btn btn-primary">Update</button>
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
<script src="jquery-3.5.0.min.js"></script>
<script>
    $(document).ready(function(){
     // Get value on keyup funtion
     $("#fb").change(function(){

     var rt=0;
     var x = Number($("#fb").val());

     var sb=x + 5;
     var tb=x + 10;
     var lb=x + 20;
     var rp=(lb + 20);
     var rt=((rp*15)/100)+rp;

     $('#sb').val(sb);
     $('#tb').val(tb);
     $('#lb').val(lb);
     $('#rt').val(rt);

 });
 });

 $(document).ready(function(){
     // Get value on keyup funtion
     $("#sb").change(function(){


     var a = Number($("#sb").val());


     var tb=a + 5;
     var lb=a + 15;
     var rp=(lb + 20);
     var rt=((rp*15)/100)+rp;


     $('#tb').val(tb);
     $('#lb').val(lb);
     $('#rt').val(rt);

 });
 });

 $(document).ready(function(){
     // Get value on keyup funtion
     $("#tb").change(function(){


     var b = Number($("#tb").val());

     var lb=b + 10;
     var rp=(lb + 20);
     var rt=((rp*15)/100)+rp;


     $('#lb').val(lb);
     $('#rt').val(rt);

 });
 });

 $(document).ready(function(){
     // Get value on keyup funtion
     $("#lb").change(function(){

     // var rt=0;
     var y = Number($("#lb").val());


     var rp=(y + 20);
     var rt=((rp*15)/100)+rp;



     $('#rt').val(rt);

 });
 });


</script>

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
