@extends('layouts.fronted')
@section('title')
Cart
@endsection
@section('content')

   <div class="py-5">
     <div class="container">
       <div class="row">
        <div class="card shadow p-3 mb-2">
            <div class="card-header h1 text-center py- mb-3">
                show cart
            </div>
        <div class="col-lg-10 m-auto">
            @php
                $totall = 0;
            @endphp
            @foreach ($cartView as $cart) 
            <div class="row product_data">
                <div class="col-3 mb-2">
                    <img class="" width="100%" height="100%" src="asset/upload/product/{{ $cart->product->image }}" alt="">
                </div>
                <div class="col-3 text-center">
                    <h4 class="mt-3">{{ $cart->product->name }}</h4>
                </div>
                <div class="col-2 text-center">
                    <h4 class="mt-3">Rs.{{ $cart->product->selling_price }}</h4>
                </div>
                <div class="col-2">
                    <div class="col-md-3">
                        <input type="hidden"  value="{{ $cart->id }}" class="prod_id">
                        @if($cart->product->selling_price > $cart->qty_id )
                        <label for="quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 150px">
                            <button class="input-group-text changeQuinity decrement-btn">-</button>
                                <input type="text" value="{{ $cart->qty_id }}" class="qty-input form-control text-center">
                            <button class="input-group-text changeQuinity increment-btn">+</button>
                        </div>
                        @else
                        <h2>out of stock</h2>
                        @endif                     
                    </div>
                </div>
                <div class="col-2">
                 
                    <a class="btn btn-success mt-4 " href="{{url('/add_to_cart_delete',$cart->id)}}">Remove</a>
                 
                </div>
            </div>
            
            @php
                $totall += $cart->product->selling_price *  $cart->qty_id;
            @endphp
            

            @endforeach
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-6">
                    <h6 class="btn btn-success float-first">Totall price : {{ $totall }}</h6>
                </div>
                <div class="col-6">
                    <a class="btn btn-success float-end" href="{{ url('checkout') }}">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@section('scripts')
<script>
    $(document).ready(function(){

      

       $('.increment-btn').click(function(e){
          e.preventDefault();
          
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value)? 0 : value;
        if(value < 10){
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
       });

       $('.decrement-btn').click(function(e){
          e.preventDefault();
          
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value,10);
        value = isNaN(value)? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
       });


    //    $('.add_to_cart_delete').click(function(e){
    //         e.preventDefault();

    //         $.ajaxSetup({
    //             headers:{
    //                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    //         $.ajax({
    //             method:"POST",
    //             url:"add_to_cart_delete",
    //             data:{
    //                'prod_id':prod_id, 
    //             },
    //             success:function(response){
    //                 alert("success");
    //             }
    //         });
    //    });

       $('.changeQuinity').click(function(e){
           e.preventDefault();
           var prod_id  = $(this).closest('.product_data').find('.prod_id').val();
           var qty_id  = $(this).closest('.product_data').find('.qty-input').val();
       });

       $.ajax({
           method:"UPDATE",
                url:"update_cart",
                data:{
                   'prod_id':prod_id,
                   'qty_id':qty_id, 
                },
                success:function(response){
                    alert("success");
                }

       });



    });
</script>
@endsection




     