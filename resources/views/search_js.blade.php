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
