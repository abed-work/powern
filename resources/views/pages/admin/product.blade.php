@extends('layouts.admin-layout')

@section('content')

    <div class="card category-list">
        <div class="card-header header-search">
            <div><i class="fas fa-clipboard-list"></i>Products List</div>
            <div class="product-search"><input type="text" name="product-search" placeholder="Search by name"></div>
        </div>
        <div class="card-body">
           <table>
               <thead>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price($)</th>
                    <th>Category</th>
                    <th>Operation</th>
               </thead>
               <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{asset('storage/assets/images/products/'.$product->images[0]->src)}}" alt="" width="70px" height="70px"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                @if (count($product->categories) > 0)
                                    @foreach ($product->categories as $category)
                                        {{$category->name}}{{($loop->iteration < count($product->categories)?',':'.')}}
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td class="operation {{($product->images[0]->src?'image':'')}}">
                                <div><a target="_blank" href={{route('product.show',[$product->id])}}><i class="fas fa-eye"></i></a></div>
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
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="label">Description</div>
                    <textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="label">Price (in USD)</div>
                    <input type="number" name="price" id="" min="0" placeholder="10.00" step="0.01" required >
                    @error('price')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
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
                    @error('product_images')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    <div id="frames" style="margin-top: 40px"></div>
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
        .header-search .product-search input{
            width: 250px;
            height: 40px;
            border-radius: 5px;
        }
    </style>

    <script>
        $(document).ready(function(){
            var $rows = $('table tbody tr');
            $('.product-search input').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
        })
    </script>

@endsection
