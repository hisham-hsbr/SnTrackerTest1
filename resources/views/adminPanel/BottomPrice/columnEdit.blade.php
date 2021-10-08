
  @foreach ($BottomPrices as $BottomPrice)
<a href="{{ route('BottomPrice.edit', $BottomPrice->id) }}"><span class="fas fa-edit"></span></a>
@endforeach
{{-- <button class="btn btn-info btn-sm"> upda</button> --}}
<a href="" style="color:red" onclick="
                        if(confirm('Are you sure, You Want to delete this?'))
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-').submit();
                        }
                        else{
                            event.preventDefault();
                        }
                        "><span class="fas fa-trash-alt "></span></a>

