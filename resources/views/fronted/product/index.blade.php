@extends('layouts.fronted')
@section('title')
Category page
@endsection
@section('content')
{{-- @include('layouts.inc.nav')
@include('layouts.inc.slider') --}}
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
      <h6 class="mb-0">Collection/{{ $category_items->name }}</h6>
  </div>
</div>
<div class="py-5">
    <div class="container">
      <div class="row">
       <h1 class="pb-5 underline"> Treading Category</h1>
       <h3>{{ $category_items->name }}</h3>
         @foreach ($product_items as $feather_category)                   
           <div class="col-md-4 mb-3">
        <a href="{{ url('/category',$category_items->slug.'/'.$feather_category->slug) }}">
           <div class="card shadow p-2">               
               <img height="180" width="100%" src="../asset/upload/product/{{ $feather_category->image }}" alt="image">
             <div class="cord-body">
               <h3 class="mb-1">{{ $feather_category->name }}</h3>
               <small class="mb-1">{{ $feather_category->selling_price }}</small>
             </div>
           </div>
        </a>
        </div>
        
        @endforeach
       </div>
      </div> 
    </div>
@endsection