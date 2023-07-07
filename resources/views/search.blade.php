@extends('app')
@section('content')
<div class="row">

    <div class="col-lg-8 mx-auto pt-3">
        <a href="{{ route('user') }}" class="btn btn-success">Add</a>
        <br>
        <br>

        <div class="table-responsive">

                <select name="category" id="category" class="form-control">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">price</th>
                        <th scope="col">Description</th>
                        {{-- <th scope="col">Category</th> --}}
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach ($products as $key=> $product)
                    <tr class="">
                        <td scope="row">{{ $key+1}}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        {{-- <td>{{ $product->categories->name[0]}}</td> --}}

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
$(document).ready(function(){
    $('#category').on('change',function(){
        var category = $(this).val();
        $.ajax({
            url:"{{ route('filter') }}",
            type:'GET',
            data:{'category':category},
            success:function(data){
               var products = data.products;
               var html = '';
               if(products.length >0){
                    for(let i =0; i<products.length;i++){
                        // products[i]['name']
                        html +='<tr> \
                            <td>'+products[i]['name']+'</td>\
                            <td>'+products[i]['name']+'</td>\
                            <td>'+products[i]['price']+'</td>\
                            <td>'+products[i]['description']+'</td>\
                            </tr>';
                    }
               }else{
                html +='<td>Not product</td>';
               }
               $("#tbody").html(html);
            }

        });
    });
});
</script>


@endsection
