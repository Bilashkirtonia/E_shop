@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-head text-center my-2 h4">ADD PRODUCT</div>
        <div class="card-body">
            <form action="{{url('/update_product',$datas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')					
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <span>Select Category</span><br>
                        <select class="form-select border" name="cate_id" id="">
                            @foreach ($data as $data )
                             <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>                      
                    </div>
                 
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Name</label>
                            <input type="text" value="{{ $datas->name }}" name="name" class="form-control border p-1" id="exampleFormControlInput1" placeholder="Enter your name">
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Slug</label>
                            <input type="text" value="{{ $datas->slug }}" name="slug" class="form-control border p-1" id="exampleFormControlInput1" placeholder="Slug">
                        </div>                      
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Small_description</label>
                            <input type="text" value="{{ $datas->small_description }}" name="small_description" class="form-control border " id="exampleFormControlInput1" placeholder="Small_description">
                        </div>                      
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Description</label>
                            <input type="text" value="{{ $datas->description }}" name="description" class="form-control border " id="exampleFormControlInput1" placeholder="Description">
                        </div>                      
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">original_price</label>
                            <input type="number" value="{{ $datas->original_price }}" name="original_price" class="form-control border " id="exampleFormControlInput1" placeholder="Original_price">
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Selling_price</label>
                            <input type="number" value="{{ $datas->selling_price }}" name="selling_price" class="form-control border " id="exampleFormControlInput1" placeholder="Selling_price">
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">qty</label>
                            <input type="number" value="{{ $datas->qty }}" name="qty" class="form-control border " id="exampleFormControlInput1" placeholder="qty">
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">tax</label>
                            <input type="number" value="{{ $datas->tax }}" name="tax" class="form-control border " id="exampleFormControlInput1" placeholder="tax">
                        </div>                      
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="form-check mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Sataus</label>
                            <input class="form-check-input" {{$datas-> status == '1' ? 'checked':''}} type="checkbox" name="status" id="flexCheckDefault">                     
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class=" form-check mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">trending</label>
                            <input class="form-check-input" {{$datas-> trending == '1' ? 'checked':''}} type="checkbox" name="trending" id="flexCheckDefault">     
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Image</label>
                            <input type="file" value="{{ $datas->image }}" name="image" class="form-control border p-1" id="exampleFormControlInput1" placeholder="Image">
                        </div>                      
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <img width="300" height="200" src= "../asset/upload/product/{{ $datas->image }}" alt="">
                        </div>                      
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Mete_title</label>
                            <input type="text" value="{{ $datas->mete_title }}" name="mete_title" class="form-control border p-1" id="exampleFormControlInput1" placeholder="Mete_title">
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">		
                            <label for="exampleFormControlInput1 " class="form-label">Mete_descript</label>
                            <input type="text" value="{{ $datas->mete_descript }}" name="mete_descript" class="form-control border p-1" id="exampleFormControlInput1" placeholder="Mete_descript">
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">		
                            <label for="exampleFormControlInput1 " class="form-label">Meta_keywords</label>
                            <input type="text" value="{{ $datas->meta_keywords }}" name="meta_keywords" class="form-control border p-1" id="exampleFormControlInput1" placeholder="meta_keywords">
                        </div>                      
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="mb-3">
                        <input type="submit" name="send" class="form-control border p-1 btn btn-success" id="exampleFormControlInput1" value="Send">
                    </div>                      
                </div>
            </form>
        </div>
    </div>
@endsection