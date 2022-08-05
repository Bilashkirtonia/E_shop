<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $datas = Category::all();
        return view('admin.category.index',compact('datas'));
    }

    public function addCategory(){
        return view('admin.category.addCategory');
    }
    
    public function insert_category(Request $request){
        $category = new Category();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = time().".".$ext;
            $image->move('asset/upload/category',$filename);
            $category->image = $filename;
        }
        								
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? "1":"0";
        $category->popular = $request->input('popular') == TRUE ? "1":"0";
        $category->mete_title = $request->input('mete_title');
        $category->mete_descript = $request->input('mete_descript');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/dashboard')->with('status','Category Add successfully');
        //return view('admin.category.addCategory');
    }

    public function editCategory($id){ 
       $datas = Category::find($id);
       return view('admin.category.editCategory',compact('datas'));
    }

    public function update_category(Request $request,$id){ 

        $data = Category::find($id);

        if($request->hasFile('image')){
            $path ='asset/upload/category/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = time().".".$ext;
            $image->move('asset/upload/category',$filename);
            $data->image = $filename;
        }

        $data->name = $request->input('name');
        $data->slug = $request->input('slug');
        $data->description = $request->input('description');
        $data->status = $request->input('status') == TRUE ? "1":"0";
        $data->popular = $request->input('popular') == TRUE ? "1":"0";
        $data->mete_title = $request->input('mete_title');
        $data->mete_descript = $request->input('mete_descript');
        $data->meta_keywords = $request->input('meta_keywords');
        $data->update();
        return redirect('/Category')->with('status','Category update successfully');
     }


     public function deleteCategory($id){ 
        $datas = Category::find($id);
        if($datas->image){
            $path ='asset/upload/category/'.$datas->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $datas->delete();

        return redirect('/Category')->with('status','Delete successfully');
     
     }

    
}
