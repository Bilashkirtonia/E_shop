<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    
    public function checkout(){
        $orders = Cart::all();
        return view('fronted.checkout',compact('orders'));
    }
    public function place_order(Request $request){  			

        $food_order = new Order();
        $food_order->name=$request->input('name');
        $food_order->email=$request->input('email');    
        $food_order->phone=$request->input('phone'); 
        $food_order->address1=$request->input('address_1'); 
        $food_order->address2=$request->input('address_2'); 
        $food_order->city=$request->input('city'); 
        $food_order->status=$request->input('status'); 
        $food_order->pincode=$request->input('pincode'); 
        $food_order->message=$request->input('message'); 
        $food_order->trackting_no = 'bilash'.rand(1111,9999);


        $cart_item_totals = Cart::where('user_id',Auth::id())->get();

        $totall = 0;
        foreach($cart_item_totals as $totall_price){
            $totall += $totall_price->product->selling_price;
        }
        $food_order->totall_price = $totall;
        $food_order->save();
        
        $cate_items = Cart::where('user_id',Auth::id())->get();

        foreach($cate_items as $item){
            Order_item::create([
                'order_id'=>$food_order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->qty_id,
                'price'=>$item->product->selling_price,
            ]);
        }
        if(Auth::user()->address1 == NULL){
            $user = User::where('id',Auth::id())->first();

        $user->name=$request->input('name');   
        $user->phone=$request->input('phone'); 
        $user->address1=$request->input('address_1'); 
        $user->address2=$request->input('address_2'); 
        $user->city=$request->input('city'); 
        $user->status=$request->input('status'); 
        $user->pincode=$request->input('pincode'); 
        $user->message=$request->input('message'); 
        $user->save();

        }
        return redirect('checkout')->with('status','successfully');

    }
}
