@extends('layouts.layout')

@section('content')
<div class="single-product">
    <div class="container">
        <div class="wrapper">
            <div class="left">
                <div class="product-main-image">
                    <img src="{{asset('/storage/assets/images/products/'.$product->images[0]->src)}}" alt="" width="100%">
                </div>
                <div class="product-sliders">
                    @foreach ($product->images as $image)
                        <img src="{{asset('/storage/assets/images/products/'.$image->src)}}" alt="" width="100px" height="100px" style="object-fit: cover">
                    @endforeach
                </div>
            </div>
            <div class="right">
                <div class="product-name">{{$product->name}}</div>
                <div class="product-price">
                    @foreach ($currencies as $currency)
                        @if ($currency->isActive)
                            <div class="price {{ $currency->symbol }}"> {{ number_format($currency->value * $product->price,2) . ' ' . $currency->icon  }}</div>
                        @endif
                    @endforeach
                </div>
                <div class="product-description">{{$product->description}}</div>
                <div class="product-category">
                    @if (count($product->categories) > 0)
                        <span>Category:</span>
                        @foreach ($product->categories as $productCategory)
                            <span>{{$productCategory->name}}{{($loop->index < count($product->categories) -1)?',':'.'}}</span>
                        @endforeach
                    @endif
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