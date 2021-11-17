@extends('layouts.layout')

@section('content')

<div class="common-banner">
    <div class="content">
        <div class="primary-title">Shop</div>
    </div>
</div>

<div class="shop">
    <div class="container">
        <div class="sidebar">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <ul>
                        @foreach ($categories as $parent)
                            <li class="category {{(count($parent->children)?'parent-category':'')}}" >
                                <a href={{route('shop',['category'=>$parent->id])}} class={{($categoryId == $parent->id ? 'active-link':'')}}>
                                    <span class="right-icon"><i class="fas fa-arrow-right"></i></span>
                                    <span>{{$parent->name}}</span>
                                </a>
                                @if (count($parent->children) > 0)
                                    <ul class="subcategory">
                                        @foreach ($parent->children as $subcategory)
                                            <li>
                                                <a href={{route('shop',['category'=>$subcategory->id])}}  class={{($categoryId == $subcategory->id ? 'active-link':'')}}>
                                                    <span class="right-icon"><i class="fas fa-arrow-right"></i></span>
                                                    {{$subcategory->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="products-list">
            @foreach ($products as $product)
                <div class="product">
                    <a href={{route('product.show',[$product->id])}}>
                        <img src="{{asset('/storage/assets/images/products/'.$product->images[0]->src)}}" alt="">
                        <div class="name">{{$product->name}}</div>
                        <div class="price">
                            <span class="new">{{$product->price}}$</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
    </div>
</div>
<script>
    jQuery(document).ready(function($){
        $('.active-link').parents('.subcategory').siblings('a').addClass('active-link');
    });
</script>
@endsection