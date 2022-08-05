@extends('layouts.fronted')
@section('title')
welcome to the home page.
@endsection
@section('content')
@include('layouts.inc.nav')
@include('layouts.inc.slider')
   <div class="py-5">
     <div class="container">
       <div class="row">
        <h1 class="pb-5 underline"> Treading product</h1>
          @foreach ($feather_products as $feather_product)              
            <div class="col-md-4 mb-3">
            <div class="card shadow p-2">
                
                <img height="180" width="100%" src="asset/upload/product/{{ $feather_product->image }}" alt="image">
              <div class="cord-body">
                <h3 class="mb-1">{{ $feather_product->name }}</h3>
                <small class="mb-1">{{ $feather_product->selling_price }}</small>
              </div>
            </div>
         </div>
         @endforeach
        </div>

        <div class="row py-5">
            <h1 class="pb-5 underline"> Treading product</h1>
              @foreach ($feather_products_status as $feather_products_status)              
                <div class="col-md-4 mb-3">
              <a href="{{ url('/category_filter',$feather_products_status->slug) }}"> 
                <div class="card shadow p-2">
                    
                    <img height="180" width="100%" src="asset/upload/product/{{ $feather_products_status->image }}" alt="image">
                  <div class="cord-body">
                    <h3 class="mb-1">{{ $feather_products_status->name }}</h3>
                    <small class="mb-1">{{ $feather_products_status->selling_price }}</small>
                  </div>
                </div>
              </a>
             </div>
             @endforeach
            </div>
       </div> 
     </div>
   @endsection

@section('scripts')
<script>
</script>
@endsection