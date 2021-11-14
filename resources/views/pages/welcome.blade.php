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
      <button data-toggle="tab" data-tabs=".gtabs.demo" data-tab=".tab-1" class="btn btn-info active" >best selling</button>
      <button data-toggle="tab" data-tabs=".gtabs.demo" data-tab=".tab-2" class="btn btn-info" >new arrivals</button>
      <button data-toggle="tab" data-tabs=".gtabs.demo" data-tab=".tab-3" class="btn btn-info" >top collection</button>
    </div>
    <br />
    <div class="container">
        <div class="gtabs demo">
            <div class="gtab active tab-1">
              <div class="products-list">
                  <div class="product">
                      <img src="/assets/images/products/winter-cloth.jpg" alt="">
                      <div class="sale">sale!</div>
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/winter-cloth.jpg" alt="">
                      <div class="sale">sale!</div>
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/winter-cloth.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/winter-cloth.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/winter-cloth.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
              </div>
            </div>
            
            <div class="gtab tab-2">
              <div class="products-list">
                  <div class="product">
                      <img src="/assets/images/products/women-sweater.jpg" alt="">
                      <div class="sale">sale!</div>
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/women-sweater.jpg" alt="">
                      <div class="sale">sale!</div>
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/women-sweater.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/women-sweater.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/women-sweater.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
              </div>
            </div>
            
            <div class="gtab tab-3">
              <div class="products-list">
                  <div class="product">
                      <img src="/assets/images/products/black-cloth.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/black-cloth.jpg" alt="">
                      <div class="sale">sale!</div>
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/black-cloth.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/black-cloth.jpg" alt="">
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
                  <div class="product">
                      <img src="/assets/images/products/black-cloth.jpg" alt="">
                      <div class="sale">sale!</div>
                      <div class="name">Ladies winter cloth</div>
                      <div class="price">
                          <span class="new">30.00$</span>
                          <span class="old">40.00$</span>
                      </div>
                  </div>
              </div>
            </div>
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

    <div class="brands">
        <div class="container">
            <div class="brands-list owl-carousel">
                <div class="brand"><img src="assets/images/brands/brand-1.png" alt=""></div>
                <div class="brand"><img src="assets/images/brands/brand-2.png" alt=""></div>
                <div class="brand"><img src="assets/images/brands/brand-3.png" alt=""></div>
                <div class="brand"><img src="assets/images/brands/brand-4.png" alt=""></div>
                <div class="brand"><img src="assets/images/brands/brand-5.png" alt=""></div>
            </div>
        </div>
    </div>


      <script>
        jQuery(document).ready(function($){
            $(".banner-carousel").owlCarousel({
                items:3,
                margin:15,
                loop:true,
                autoPlay:true
            });
            $(".brands-list").owlCarousel({
                items:5,
                margin:15,
                loop:true,
                autoPlay:true
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