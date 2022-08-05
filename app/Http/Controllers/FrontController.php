<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodact;
use App\Models\Category;

class FrontController extends Controller
{
    public function index(){
        $feather_products = Prodact::where('trending','1')->take(6)->get();
        $feather_products_status = Prodact::where('status','1')->take(15)->get();
        return view('fronted.index',compact('feather_products','feather_products_status'));
    }
    public function category(){
        $feather_categorys = Category::where('status','0')->get();
        return view('fronted.category',compact('feather_categorys'));
    }
    public function category_filter($slug){
        if(Category::where('slug',$slug)->exists()){
            $category_items = Category::where('slug',$slug)->first();
            $product_items = Prodact::where('cate_id',$category_items->id)->where('status','0')->get();
            return view('fronted.product.index',compact('category_items','product_items'));
        }else{
            return redirect('/')->with('status','Slug Dose not exit');
        }
    }
    public function categoryview($cate_slug,$pro_slug){
        if(Category::where('slug',$cate_slug)->exists()){
            if(Prodact::where('slug',$pro_slug)->exists()){
                $product = Prodact::where('slug',$pro_slug)->first();
                return view('fronted.product.productView',compact('product'));
            }else{
                return redirect('/')->with('status','Produce Dose not found');
            }
        }return redirect('/')->with('status','Category Dose not exit');
    }
}

