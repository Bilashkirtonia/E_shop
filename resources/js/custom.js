<script>
    $(document).ready(function(){

        // $('.addTobtn').click(function(e){
        //     e.preventDefault();
        //     var product_id = $(this).closest('.product_data').find('.prod_id').val();
        //     var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        //     $.ajaxSetup({
        //         headers:{
        //             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         method:"POST",
        //         url:"/add_to_cart",
        //         data:{
        //             'product_id':product_id,
        //             'product_qty':product_qty,
        //         },
        //         success:function(response){
        //             swal(response.status);
        //         }
        //     });


        // });














       $('.increment-btn').click(function(e){
          e.preventDefault();
          
        var inc_value = $('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value)? 0 : value;
        if(value < 10){
            value++;
            $('.qty-input').val(value);
        }
       });



       $('.decrement-btn').click(function(e){
          e.preventDefault();
          
        var dec_value = $('.qty-input').val();
        var value1 = parseInt(dec_value,10);
        value = isNaN(value1)? 0 : value1;
        if(value1 > 1){
            value1--;
            $('.qty-input').val(value1);
        }
       });


    });
    
</script>