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
                                <a href="">
                                    <span><img src="{{asset('assets/images/arrow-right.png')}}" alt=""></span>
                                    <span>{{$parent->name}}</span>
                                </a>
                                @if (count($parent->children) > 0)
                                    <ul class="subcategory">
                                        @foreach ($parent->children as $subcategory)
                                            <li><a href="">{{$subcategory->name}}</a></li>
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
</div>

@endsection