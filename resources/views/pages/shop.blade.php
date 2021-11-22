@extends('layouts.layout')

@section('content')

<div class="common-banner">
    <div class="content">
        <div class="primary-title">Products</div>
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
                                @if ((count($parent->children) > 0))
                                <div class="flex">
                                    <a href={{route('shop',['category'=>$parent->id])}} class={{($categoryId == $parent->id ? 'active-link':'')}}>
                                        <span>{{$parent->name}}</span>
                                    </a>
                                    <span><i class="fas fa-plus"></i></span>
                                </div>
                                @else
                                    <a href={{route('shop',['category'=>$parent->id])}} class={{($categoryId == $parent->id ? 'active-link':'')}}>
                                        <span>{{$parent->name}}</span>
                                    </a>
                                @endif
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
                    </a>
                </div>
            @endforeach
            @if ($categoryId !=0 )
                @foreach ($categories as $parent)
                    @if ($parent->id == $categoryId)
                        @foreach ($parent->children as $category)
                            @foreach ($category->products as $product)
                                <div class="product">
                                    <a href={{route('product.show',[$product->id])}}>
                                        <img src="{{asset('/storage/assets/images/products/'.$product->images[0]->src)}}" alt="">
                                        <div class="name">{{$product->name}}</div>
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($){
        $('.active-link').parents('.subcategory').siblings('a').addClass('active-link');
        $('.category ').click(function(){
            $(this).children('.subcategory').slideToggle();
        })
    });
</script>
@endsection