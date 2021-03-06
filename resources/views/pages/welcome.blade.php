@extends('layouts.layout')

@section('content')
    <div class="banner relative">
        <img class="banner-img" src="assets/images/home/home-banner.jpg" alt="">
        <div class="content absolute">
            <div class="container flex justify-between align-i-center">
                <div class="left">
                    <div class="primary-title">DyBO Phone</div>
                    <div class="description">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</div>
                    <div class="btn"><a href="#">buy now</a></div>
                </div>
                <div class="right"><img src="/assets/images/home/banner-phone.jpg" alt=""></div>
            </div>
        </div>
    </div>
    <div class="owl-carousel banner-carousel">
        <div> <img src="/assets/images/home/carousel-1.png" alt=""></div>
        <div> <img src="/assets/images/home/carousel-2.png" alt=""></div>
        <div> <img src="/assets/images/home/carousel-1.png" alt=""></div>
    </div>

    <div class="container" id="tabs">
        @php
            $index=1;
        @endphp
        @foreach ($featuredCategories as $category)
            @if ($category->showAtHome)
                <button data-toggle="tab" data-tabs=".gtabs.demo" data-tab=".tab-{{$loop->index++}}" class="btn btn-info" >{{$category->name}}</button>
            @endif
        @endforeach
    </div>
    <br />
    <div class="container">
        <div class="gtabs demo">
        @php
            $index=1;
        @endphp
        @foreach ($featuredCategories as $category)
            @if ($category->showAtHome)
                <div class="gtab {{($index ==1 ? 'active':'')}} tab-{{$index++}}">
                    <div class="products-list">
                        @foreach ($category->products as $product)
                            <div class="product">
                                <a href={{route('product.show',[$product->id])}}>
                                    <img src="{{asset('storage/assets/images/products/'.$product->images[0]->src)}}" alt="">
                                    <div class="name">{{$product->name}}</div>
                                </a>
                            </div>  
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
          </div>
    </div>
    
    <div class="services">
        <div class="container">
            <div class="service">
                <h3>FREE SHIPPING</h3>
                <p>Lorem ipsum dolor sit amet consec adi elit sed do eiusmod tempor</p>
            </div>
            <div class="service">
                <h3>ONLINE SUPPORT</h3>
                <p>Lorem ipsum dolor sit amet consec adi elit sed do eiusmod tempor</p>
            </div>
            <div class="service">
                <h3>MONEY RETURN</h3>
                <p>Lorem ipsum dolor sit amet consec adi elit sed do eiusmod tempor</p>
            </div>
        </div>
    </div>


      <script>
        jQuery(document).ready(function($){
            $("#tabs").children(":first").addClass('active');

            $(".banner-carousel").owlCarousel({
                items:3,
                margin:15,
                loop:true,
                autoPlay:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    800:{
                        items:3
                    }
                }
            });

            $("[data-toggle='tab']").click(function () {
                $("[data-toggle='tab']").removeClass('active');
                $(this).addClass('active');
                var tabs = $(this).attr('data-tabs');
                var tab = $(this).attr("data-tab");
                $(tabs).find(".gtab").removeClass("active");
                $(tabs).find(tab).addClass("active");
            });
        });
      </script>

@endsection