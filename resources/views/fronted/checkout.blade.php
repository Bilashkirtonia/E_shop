@extends('layouts.fronted')
@section('title')
Checkout page
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row m-auto">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">check out the order</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('place_order') }}" method="post">
                            {{ @csrf_field() }}
                            <div class="row">                       
                            
                            <div class="col-md-6">
                                <h4 class="text-center">basic details</h4>
                                <div class="card shadow p-4">
                                <div class="row checkout-from">
                                    <div class="col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control" placeholder="Enter your name...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email</label>
                                        <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control" placeholder="Enter your email...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Phone</label>
                                        <input type="number" value="{{ Auth::user()->phone }}" name="phone" class="form-control" placeholder="Enter your number...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Address_1</label>
                                        <input type="text" value="{{ Auth::user()->address1 }}" name="address_1" class="form-control" placeholder="Enter your address 1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Address_2</label>
                                        <input type="text" value="{{ Auth::user()->address2 }}" name="address_2" class="form-control" placeholder="Enter your Address2">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">City</label>
                                        <input type="text"value="{{ Auth::user()->city }}" name="city" class="form-control" placeholder="Enter your City...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input type="text"value="{{ Auth::user()->status }}" name="status" class="form-control" placeholder="Enter your status...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Pin code</label>
                                        <input type="number" value="{{ Auth::user()->pincode }}" name="pincode" class="form-control" placeholder="Enter your pin cord...">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Message</label>
                                        <input type="text" value="{{ Auth::user()->message }}" name="message" class="form-control" placeholder="Enter your pin cord...">
                                    </div>
                                </div>
                            </div>
                            </div>
                             <div class="col-md-6">
                                <h4 class="text-center">order details</h4>
                                <div class="card p-4">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>qty</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{$order->product->name }}</td>
                                                        <td>{{$order->product->qty }}</td>
                                                        <td>{{$order->product->selling_price }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <button class="btn btn-success btn-block mt-4">submit</button>                       
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection