@if (session()->has('message') || session()->has('status'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif

@if ($errors->count() > 0)
    @foreach ($errors->all() as $error)
    {{-- <div class="row"> --}}
    {{-- <div class="col-sm-2 "> </div> --}}
        <div class="col-sm-4 alert alert-danger">{{ $error }}</div>
    {{-- </div> --}}
    @endforeach
@endif

