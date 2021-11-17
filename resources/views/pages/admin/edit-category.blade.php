@extends('layouts.admin-layout')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-edit"></i> Edit the category </div>
        <div class="card-body">
            <form action={{route('dashboard.category.update',[$category->id])}} method="POST" enctype="multipart/form-data" id="editContent">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="label">Name</div>
                    <input type="text" name="category_name" id="" placeholder="Laptops..." value="{{$category->name}}">
                    @error('category_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="label">Description</div>
                    <textarea  id="" name="category_description" cols="30" rows="10" placeholder="Description">{{$category->description}}</textarea>
                    @error('category_description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="label">Choose a parent category</div>
                    <select name="category_parent" id="">
                            @foreach ($categories as $cat)
                                @if ($category->parent == $cat->id)
                                    <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                @else
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endif
                            @endforeach
                            <option value="" {{($category->parent == NULL?'selected':'')}} >Default: no parent category</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="label">Check to add this category on home page</div>
                    <div class="isfeature">
                        <input type="checkbox" name="isFeatured" id="" {{($category->showAtHome?'checked':'')}}>
                        <span class="checkbox-label">show on home page</span>
                    </div>
                </div>
                <div class="form-group image-parent">
                    <span class="btn btn-primary btn-file">
                        <i class="fas fa-images"></i> 
                        <span class="image-label">Upload an image</span>
                        <input type="file" name="category_image" accept="image/gif, image/jpeg, image/png">
                    </span>
                </div>
                @if ($category->image)
                    <div class="edit-image form-group" style="margin-top: 40px">
                        @if ($category->image)
                            <img src="{{asset('/storage/assets/images/categories/'.$category->image)}}" alt="" height="250px" width="250px">
                            <div class="del">
                                <i class="fas fa-trash-alt" style="color:red;cursor: pointer;"></i>
                            </div>
                        @endif
                    </div>
                @endif
                <input type="hidden" name="hidden_category_image" value="{{$category->image}}">
                <div class="form-group ">
                    <input class="save-btn" type="submit" value="Save Changes" form="editContent">
                </div>
            </form>

            @if(session('success'))
                <div class="success">{{session('success')}}</div>
            @endif
        </div>
    </div>
    <script>
        if(document.querySelector('.del')){
            document.querySelector('.del').addEventListener('click',()=>{
                document.querySelector('[name="hidden_category_image"]').setAttribute('value','');
                document.querySelector('.edit-image').remove();
            });
        }
    </script>
@endsection