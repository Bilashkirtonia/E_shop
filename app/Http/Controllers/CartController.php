<?php

namespace App\Http\Controllers;
use App\Models\Prodact;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function Cart(Request $request){
        $product_id = $request->input('prod_id');
        $product_qty = $request->input('quantity');

        if(Auth::check()){
            $product_check = Prodact::where('id',$product_id)->first();
           
            if($product_check){
                if(Cart::where('prod_id',$product_qty)->where('user_id',Auth::id())->exists()){
                    return redirect('/')->with('status',$product_check->name.'already add to cart');
                }else{
                $product_ent = new Cart();
                $product_ent->prod_id = $product_id;
                $product_ent->user_id = Auth::id();
                $product_ent->qty_id = $product_qty;
                $product_ent->save();
                return redirect('/')->with('status',$product_check->name.'add to cart');
                }
            }
        }else{
            return redirect('/')->with('status','login to continue');
        }
        
        
    }


    public function ViewCart(){
        $cartView = Cart::where('user_id',Auth::id())->get();
            return view('fronted.cartView',compact('cartView'));   
        }

        public function update_cart(Request $request){
            $prod_id = $request->input('prod_id');
            $qty_id = $request->input('qty_id');


        }

        public function add_to_cart_delete(Request $request,$id){

            if(Auth::check()){

                $prod_id = $id;
                
                if(Cart::where('id',$prod_id)->where('user_id',Auth::id())->exists()){

                   $cartId = Cart::where('id',$prod_id)->where('user_id',Auth::id())->first();
                   $cartId->delete();
                   return redirect('/show_cart')->with('status','delete successfully');
                }
                 
            }else{
                return redirect('/')->with('status','login to contunie');
               // return response()->json(['status'=>'login to contunie']);
                }   
            }
        
 }