<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Prodact;
use App\Models\Order_item;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $orders = Order::where('id',Auth::id())->get();
        return view('fronted.order.index',compact('orders'));
    }

    public function view_order($id){
        $view_order = Order::where('id',$id)->where('id',Auth::id())->first();
        return view('fronted.order.view_order',compact('view_order'));
    }
}
