@extends('layouts.fronted')
@section('title')
My orders Details
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">My orders Details</div>
                    <div class="cord-body">
                        <div class="row">
                            <div class="col-md-5">
                                <h3>order info</h3>
                                <label for="">name</label>
                                <div class="border py-2">{{ $view_order->name}}</div>
                                <label for="">email</label>
                                <div class="border py-2">{{ $view_order->email}}</div>
                                <label for="">phone</label>
                                <div class="border py-2">{{ $view_order->phone}}</div>
                                <label for="">address</label>
                                <div class="border py-2">{{ $view_order->address1}}</div>
                                <label for="">pincode</label>
                                <div class="border py-2">{{ $view_order->pincode}}</div>
                                <label for="">city</label>
                                <div class="border py-2">{{ $view_order->city}}</div>
                                
                            </div>
                            <div class="col-md-7">
                                <h3>order list</h3>
                                <table class="table table-bordered my-2 p-3 text-center">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quility</th>
                                            <th>Price</th>
                                            <th>image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($view_order->orderItems as $order )
                                            <tr>
                                                <td>{{ $order->prodacts->name }}</td>
                                                <td>{{ $order->qty }}</td>
                                                <td>{{ $order->price}}</td>
                                                
                                            </tr>
                                        @endforeach                                     
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection