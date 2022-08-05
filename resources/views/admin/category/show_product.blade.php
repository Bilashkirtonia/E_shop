@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-head">
            <h2 class="h2 text-center py-2">Category table</h2>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-md-10 m-auto">
                    <table class="table table-striped">
                        <thead>
                          <tr class="bg-success text-dark">
                            <th scope="col">Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Selling price</th>
                            <th scope="col">image</th>
                            <th scope="col">Action</th>
                          </tr>
                          
                        </thead>
                        
                        <tbody>
                
                @foreach ($products as $product)
              
                
                          <tr>
                            <th scope="row">01</th>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::substr($product->description, 0, 30) }}</td>
                            <td class="text-center">{{ $product->selling_price }}</td>
                            <td><img height="50"width="100" src="asset/upload/product/{{$product->image}}" alt=""></td>
                           
                            <td><a href="{{ url('/editProduct',$product->id) }}" type="button" class="btn btn-info">Edit</a> <a href="{{ url('/deleteProduct',$product->id) }}" type="button" class="btn btn-primary">Delete</a></td>
                          </tr>     
                @endforeach    
                                             
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection