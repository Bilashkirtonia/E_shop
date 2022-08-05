@extends('layouts.fronted')
@section('title')
My orders
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">My orders</div>
                    <div class="cord-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <table class="table table-bordered my-2 p-3 text-center">
                                    <thead>
                                        <tr>
                                            <th>Traking number</th>
                                            <th>Totall price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order )
                                            <tr>
                                                <td>{{ $order->	trackting_no }}</td>
                                                <td>{{ $order->totall_price }}</td>
                                                <td>{{ $order->status == '0'?'pending':'conplete'}}</td>
                                                <td> <a class="btn btn-primary" href="{{ url('view_order',$order->id) }}">View</a></td>
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