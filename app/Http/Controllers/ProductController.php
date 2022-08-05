<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Prodact;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    
    public function add_product(){ 
        $datas = Category::all();
        return view('admin.category.add_product',compact('datas'));
     }

     public function show_product(){
      $products = Prodact::all();
        return view('admin.category.show_product',compact('products'));
     }

     public function insert_product(Request $request){ 
         $products = new Prodact();

         if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = time().".".$ext;
            $image->move('asset/upload/product',$filename);
            $products->image = $filename;
         }
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->tax = $request->input('tax');
        $products->status = $request->input('status') == TRUE ? "1":"0";
        $products->trending = $request->input('trending') == TRUE ? "1":"0";
        $products->mete_title = $request->input('mete_title');
        $products->mete_descript = $request->input('mete_descript');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->save();
        return redirect('/show_product')->with('status','Category Add successfully');
        
     }
     
     public function editProduct($id){
      $data = Category::all();
      $datas = Prodact::find($id);
      return view('admin.category.editProduct',compact('datas','data'));
     }

     public function update_product(Request $request ,$id){
      //$data = Category::all();
      $products = Prodact::find($id);
      
      if($request->hasFile('image')){
         $path = 'asset/upload/product/'.$products->image;
         if(File::exists($path)){
            File::delete($path);
         }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = time().".".$ext;
            $image->move('asset/upload/product',$filename);
            $products->image = $filename;
      }

      $products->cate_id = $request->input('cate_id');
      $products->name = $request->input('name');
      $products->slug = $request->input('slug');
      $products->small_description = $request->input('small_description');
      $products->description = $request->input('description');
      $products->original_price = $request->input('original_price');
      $products->selling_price = $request->input('selling_price');
      $products->qty = $request->input('qty');
      $products->tax = $request->input('tax');
      $products->status = $request->input('status') == TRUE ? "1":"0";
      $products->trending = $request->input('trending') == TRUE ? "1":"0";
      $products->mete_title = $request->input('mete_title');
      $products->mete_descript = $request->input('mete_descript');
      $products->meta_keywords = $request->input('meta_keywords');
      $products->update();
      return redirect('/show_product')->with('status','Product Add successfully');
      
     }

     public function deleteProduct($id){ 
      $datas = Prodact::find($id);
      if($datas->image){
          $path ='asset/upload/category/'.$datas->image;
          if(File::exists($path)){
              File::delete($path);
          }
      }
      $datas->delete();

      return redirect('/show_product')->with('status','Delete successfully');
   
   }

}
