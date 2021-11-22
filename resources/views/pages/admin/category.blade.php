@extends('layouts.admin-layout')

@section('content')

    <div class="card category-list">
        <div class="card-header header-search">
            <div><i class="fas fa-clipboard-list"></i>Categories List</div>
            <div class="category-search"><input type="text" placeholder="Search By Name"></div>
        </div>
        <div class="card-body">
           <table>
               <thead>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                    <th>Show on home</th>
                    <th>Operation</th>
               </thead>
               <tbody>
                    @foreach ($categories as $parent)
                        @php
                            $parentCounter=$loop->iteration
                        @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                @if ($parent->image)
                                    <img src="{{asset('/storage/assets/images/categories/'.$parent->image)}}" alt="" height="50px" width="50px">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{$parent->name}}</td>
                            <td>-</td>
                            <td>
                                @if ($parent->showAtHome)
                                    <i class="fas fa-check"></i>
                                @else
                                    <i class="fas fa-times"></i>
                                @endif
                            </td>
                            <td class="operation {{($parent->image ?'image':'')}}">
                                <div><a target="_blank" href={{route('shop',['category'=>$parent->id])}}><i class="fas fa-eye"></i></a></div>
                                <div><a href={{route('dashboard.category.edit',[$parent->id])}}><i class="fas fa-edit edit"></i></a></div>
                                <div>
                                    <form class="delete-form" action={{ route('dashboard.category.delete', [$parent->id]) }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fas fa-trash-alt delete"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @if ($parent->children->count())
                            @foreach ($parent->children as $child)
                            <tr>
                                <td>{{$parentCounter.'.'.$loop->iteration}}</td>
                                <td>
                                    @if ($child->image)
                                        <img src="{{asset('/storage/assets/images/categories/'.$child->image)}}" alt="" height="50px" width="50px">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{$child->name}}</td>
                                <td>{{$parent->name}}</td>
                                <td>
                                    @if ($child->showAtHome)
                                        <i class="fas fa-check"></i>
                                    @else
                                        <i class="fas fa-times"></i>
                                    @endif
                                </td>
                                <td class="operation {{($child->image ?'image':'')}}">
                                    <div><a target="_blank" href={{route('shop',['category'=>$child->id])}}><i class="fas fa-eye"></i></a></div>
                                    <div><a href={{route('dashboard.category.edit',[$child->id])}}><i class="fas fa-edit edit"></i></a></div>
                                    <div>
                                        <form class="delete-form" action={{ route('dashboard.category.delete', [$child->id]) }} method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fas fa-trash-alt delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    @endforeach
               </tbody>
           </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><i class="fas fa-plus"></i> Add a category </div>
        <div class="card-body">
            <form action="{{route('dashboard.category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="label">Name</div>
                    <input type="text" name="category_name" id="" placeholder="Laptops...">
                    @error('category_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="label">Description</div>
                    <textarea  id="" name="category_description" cols="30" rows="10" placeholder="Description"></textarea>
                    @error('category_description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="label">Choose a parent category</div>
                    <select name="category_parent" id="">
                        <option value="" selected>Default: no parent category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="label">Check to add this category on home page</div>
                    <div class="isfeature">
                        <input type="checkbox" name="isFeatured" id="">
                        <span class="checkbox-label">show on home page</span>
                    </div>
                </div>
                <div class="form-group image-parent">
                    <span class="btn btn-primary btn-file">
                        <i class="fas fa-images"></i> 
                        <span class="image-label">Upload an image</span>
                        <input type="file" id="images" name="category_image" accept="image/gif, image/jpeg, image/png">
                    </span>
                    @error('category_image')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    <div id="frames"> </div>
                </div>
                <div class="form-group ">
                    <input class="save-btn" type="submit" value="Add">
                </div>
            </form>
            @if(session('success'))
                <div class="success">{{session('success')}}</div>
            @endif
        </div>
    </div>

    <style>
        .header-search{
            display: flex;
            justify-content: space-between;
            align-items: center
        }
        .header-search .category-search input{
            width: 250px;
            height: 40px;
            border-radius: 5px;
        }
    </style>

    <script>
        $(document).ready(function(){
            var $rows = $('table tbody tr');
            $('.category-search input').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
        })
    </script>



@endsection