@extends('layouts.fronted')
@section('title',$product->name)
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection/{{ $product->category->name }}/{{ $product->name }}</h6>
    </div>
</div>
    <div class="contanier">
        
        <div class="row">
            <div class="col-md-10 m-auto mt-5">
                <div class="card shadow product_data">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-4">
                                <img height="100%" width="100%" style="object-fit: cover" src="../asset/upload/product/{{ $product->image }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h2>{{ $product->name }}</h2>
                                    </div>
                                    <div class="col-md-2">
                                        @if($product->trending == 1)
                                        <div class="btn btn-success">Trending</div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <p style="text-decoration: line-through;">{{ $product->original_price }}</p>
                                <p>{{ $product->selling_price }}</p>
                                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis dignissimos vel vero ea temporibus perferendis hic veniam ad quasi illo quia 
                                    eligendi expedita, ullam recusandae inventore praesentium possimus autem!
                                </span>
                                <hr>
                                @if ($product->qty > 0)
                                <div class="btn btn-success">In-stock</div><br>
                                @else
                                <div class="btn btn-success">Out-stock</div><br>
                                @endif
                                
                                
                            <form action="{{ url('/add_to_cart') }}" method="post">
                             @csrf                                
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <input type="hidden" name="prod_id" value="{{ $product->id }}" class="prod_id">
                                        <label for="quantity">Quantity</label>
                                        <div class="input-group text-center mb-3" style="width: 150px">
                                            <button class="input-group-text decrement-btn">-</button>
                                                <input type="text" name="quantity" value="0" class="qty-input form-control text-center">
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                        <span class=""></span>
                                    </div>
                                    <div class="col-md-9">
                                        <button type="button" class="btn btn-success addTobtn mt-4" name='send'>Add to Wishlite</button>
                                        <div class="btn btn-primary mt-4">Add to cart</div>
                                    </div>                                   
                                    
                                </div>
                                <button class="btn btn-success" name="send">Add to wishlite</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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
        var value = parseInt(dec_value,10);
        value = isNaN(value)? 0 : value;
        if(value > 1){
            value--;
            $('.qty-input').val(value);
        }
       });
    });
</script>
@endsection