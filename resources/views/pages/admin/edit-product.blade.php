@extends('layouts.admin-layout')


@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-edit"></i> Edit the product </div>
        <div class="card-body">
            <form action={{route('dashboard.product.update',[$product->id])}} method="POST" enctype="multipart/form-data" id="editContent">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="label">Name</div>
                    <input type="text" name="name" id="" placeholder="Laptops..." value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <div class="label">Price</div>
                    <input type="number" name="price" id="" min="0" placeholder="10.00" step="0.01" required value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <div class="label">Description</div>
                    <textarea  id="" name="description" cols="30" rows="10" placeholder="Description">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <div class="label">Choose one or more categories</div>
                    <select data-placeholder="Begin typing a category name to filter..." multiple class="chosen-select" name="product_categories[]">
                           @foreach ($product->categories as $productCategory)
                                <option selected value="{{$productCategory->id}}">{{$productCategory->name}}</option> 
                           @endforeach
                           @foreach ($categories as $category)
                            @php
                                $notIn=true
                            @endphp
                               @foreach ($product->categories as $productCategories)
                                   @if ($productCategories->id == $category->id)
                                       @php
                                           $notIn=false
                                       @endphp
                                   @endif
                               @endforeach
                               @if ($notIn)
                                    <option value="{{$category->id}}">{{$category->name}}</option> 
                               @endif
                           @endforeach
                    </select>
                </div>
                <div class="form-group image-parent">
                    <span class="btn btn-primary btn-file">
                        <i class="fas fa-images"></i> 
                        <span class="image-label">Upload an image</span>
                        <input id="images" type="file" name="product_images[]" accept="image/gif, image/jpeg, image/png" multiple>
                    </span>
                    <div class="hidden-images">
                        
                    </div>
                </div>
                @if (count($product->images) > 0)
                    @foreach ($product->images as $image)
                        <div class="edit-image form-group" style="margin-top: 40px">
                            <img src="{{asset('/storage/assets/images/products/'.$image->src)}}" alt="" height="200px" width="200px" style="object-fit:cover">
                            <div class="del" data-src={{$image->src}}>
                                <i class="fas fa-trash-alt" style="color:red;cursor: pointer;"></i>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div id="frames"></div>
                
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
        $(document).ready(function(){
            $('.edit-image .del').click(function(){
                $('<input>').attr({
                    type: 'hidden',
                    name: 'removed_images[]',
                    value: $(this).attr('data-src')
                }).appendTo('.hidden-images');
                $(this).parent().remove();
            })
        });
    </script>
@endsection