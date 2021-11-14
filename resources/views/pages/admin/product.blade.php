@extends('layouts.admin-layout')

@section('content')

    <div class="card category-list">
        <div class="card-header"><i class="fas fa-clipboard-list"></i>Products List</div>
        <div class="card-body">
           <table>
               <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Operation</th>
               </thead>
               <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                @if (count($product->categories) > 0)
                                    @foreach ($product->categories as $category)
                                        {{$category->name}},
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td class="operation">
                                <div><i class="fas fa-eye"></i></div>
                                <div><a href={{route('dashboard.product.edit',[$product->id])}}><i class="fas fa-edit"></i></a></div>
                                <div>
                                    <form class="delete-form" action={{route('dashboard.product.delete',[$product->id])}} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fas fa-trash-alt delete"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><i class="fas fa-plus"></i> Add a product </div>
        <div class="card-body">
            <form action="{{route('dashboard.product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="label">Name</div>
                    <input type="text" name="name" id="" placeholder="Laptops...">
                </div>
                <div class="form-group">
                    <div class="label">Description</div>
                    <textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <div class="label">Price</div>
                    <input type="number" name="price" id="" min="0" placeholder="10.00" step="0.01" required >
                </div>
                <div class="form-group">
                    <div class="label">Choose one or more categories</div>
                    <select data-placeholder="Begin typing a category name to filter..." multiple class="chosen-select" name="product_categories[]">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group image-parent">
                    <span class="btn btn-primary btn-file">
                    <i class="fas fa-images"></i> Upload product images<input id="images" type="file" name="product_images[]" multiple>
                    </span>
                    <div id="frames" style="margin-top: 40px"></div>
                </div>
                <div class="form-group ">
                    <input class="save-btn" type="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
@endsection