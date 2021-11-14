@extends('layouts.admin-layout')

@section('content')

    <div class="card category-list">
        <div class="card-header"><i class="fas fa-clipboard-list"></i>Categories List</div>
        <div class="card-body">
           <table>
               <thead>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Parent Category</th>
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
                            <td class="operation">
                                <div><i class="fas fa-eye"></i></div>
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
                                <td class="operation">
                                    <div><i class="fas fa-eye"></i></div>
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
                </div>
                <div class="form-group">
                    <div class="label">Description</div>
                    <textarea  id="" name="category_description" cols="30" rows="10" placeholder="Description"></textarea>
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
                <div class="form-group image-parent">
                    <span class="btn btn-primary btn-file">
                        <i class="fas fa-images"></i> 
                        <span class="image-label">Upload an image</span>
                        <input type="file" id="images" name="category_image" accept="image/gif, image/jpeg, image/png">
                    </span>
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
@endsection