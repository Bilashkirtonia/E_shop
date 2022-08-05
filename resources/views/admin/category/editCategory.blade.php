@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-head text-center my-2 h4">ADD CATEGORY</div>
        <div class="card-body">
            <form action="{{url('/update_category',$datas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')					
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Name</label>
                            <input type="text" value="{{ $datas->name }}" name="name" class="form-control border p-1" id="exampleFormControlInput1">
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
                            <label for="exampleFormControlInput1 " class="form-label">Description</label>
                            <input type="text" value="{{ $datas->description }}" name="description" class="form-control border " id="exampleFormControlInput1" placeholder="Description">
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Status</label>
                            <input class="form-check-input" type="checkbox" {{$datas->status == '1'? 'checked':''}} name="status" id="flexCheckDefault">                     
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class=" form-check mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Popular</label>
                            <input class="form-check-input" type="checkbox" {{$datas->popular == '1'? 'checked':''}} name="popular" id="flexCheckDefault">     
                        </div>                      
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1 " class="form-label">Image</label>
                            <input type="file"  name="image" class="form-control border p-1" id="exampleFormControlInput1" placeholder="Image">
                        </div>                      
                    </div>

                    <div class="col-md-6 mb-3">
                        <img width="300" height="200" src= "../asset/upload/category/{{ $datas->image }}" alt="">                                        
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