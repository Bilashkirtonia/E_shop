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
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">image</th>
                            <th scope="col">Action</th>
                          </tr>
                          
                        </thead>
                        
                        <tbody>
                
                @foreach ($datas as $data)
              
                
                          <tr>
                            <th scope="row">01</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ Str::substr($data->description, 0, 50) }}</td>
                            <td><img height="50"width="100" src="asset/upload/category/{{$data->image}}" alt=""></td>
                           
                            <td><a href="{{ url('/editCategory',$data->id) }}" type="button" class="btn btn-info">Edit</a> <a href="{{ url('/deleteCategory',$data->id) }}" type="button" class="btn btn-primary">Delete</a></td>
                          </tr>     
                @endforeach    
                                             
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection