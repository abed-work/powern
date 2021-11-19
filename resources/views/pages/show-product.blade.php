@extends('layouts.layout')

@section('content')

<div class="single-product">
    <div class="container">
        <div class="wrapper">
            <div class="left">
                <div class="product-main-image">
                    <img src="{{asset('/storage/assets/images/products/'.$product->images[0]->src)}}" alt="">
                </div>
                <div class="product-sliders">
                    @foreach ($product->images as $image)
                        <img src="{{asset('/storage/assets/images/products/'.$image->src)}}" alt="" width="100px" height="100px" style="object-fit: cover">
                    @endforeach
                </div>
            </div>
            <div class="right">
                <div class="product-name">{{$product->name}}</div>
                <div class="product-price">{{$product->price}}$</div>
                <div class="product-description">{{$product->description}}</div>
                <div class="product-category">
                    @if ($product->categories)
                        <span>Category:</span>
                        @foreach ($product->categories as $productCategory)
                            <span>{{$productCategory->name}}{{($loop->index < count($product->categories) -1)?',':'.'}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="order-btn">
                    <a href="https://wa.me/{{$settings[2]->value}}/?text=Hello I want to purchase this item /n {{Request::url()}} "><i class="fab fa-whatsapp"></i> <span>order now</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($){
        $('.product-sliders img').first().addClass('active-image');
        $('.product-sliders img').click(function(){
            $('.product-sliders img').each(function(){
                $(this).removeClass('active-image');
            });
            $(this).addClass('active-image');
            let getSrc = $(this).attr('src');
            $('.product-main-image img').attr('src',getSrc);
        });
    });
</script>

@endsection