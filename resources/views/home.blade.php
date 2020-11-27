@extends('layouts.front')

@section('content')

<div class="pl-200 pr-200 overflow clearfix">
    <div class="categori-menu-slider-wrapper clearfix">
        <div class="categories-menu">
            <div class="category-heading">
                <h3> All Departments <i class="pe-7s-angle-down"></i></h3>
            </div>
            <div class="category-menu-list">
                <ul>
                    @foreach($categories as $category)
                        <li>
                        <a href="{{route('products.index', ['category_id' => $category->id])}}">{{$category->name}}<i
                                    class="pe-7s-angle-right"></i></a>

                                    @php
                                        $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
                                    @endphp

                               @if($children->isNotEmpty())
                                <div class="category-menu-dropdown">

                                    @foreach ($children as $child)
                                        <div class="category-dropdown-style category-common3">
                                            <h4 class="categories-subtitle">
                                                <a href="{{route('products.index', ['category_id' => $child->id])}}">
                                                {{$child->name}}
                                                </a>

                                              </h4>
                                            @php
                                                $grandChild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                            @endphp
                                            @if($grandChild->isNotEmpty())
                                                <ul>
                                                    @foreach ($grandChild as $c)
                                                        <li><a href="{{route('products.index', ['category_id' => $c->id])}}">{{$c->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    @endforeach


                                </div>

                              @endif
                        </li>

                    @endforeach

                </ul>
            </div>
        </div>
        <div class="menu-slider-wrapper">
            <div class="menu-style-3 menu-hover text-center">
                <nav>
                    <ul>
                        <li><a href="{{url('/')}}">home </a>

                        </li>


                        <li><a href="#">blog  <span
                                    class="sticker-new">hot</span></a>

                        </li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="slider-area">
                <div class="slider-active owl-carousel">
                    <div class="single-slider single-slider-hm3 bg-img pt-170 pb-173"
                        style="background-image: url(https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/30-series/geforce-ampere-30-series-og-image-1200x630.jpg)">
                        <div class="slider-animation slider-content-style-3 fadeinup-animated">
                            <h2 style="color:white; class="animated">GEFORCE RTX 30
                                 <br>HIGHEST LEVEL OF GAME</h2>
                            <h4 style="color:white; class="animated">Best Product With warranty </h4>
                            <a class="electro-slider-btn btn-hover" href="product-details.html">buy now</a>
                        </div>
                    </div>
                    <div class="single-slider single-slider-hm3 bg-img pt-170 pb-173"
                        style="background-image: url(assets/img/slider/ryzen.jpg)">
                        <div class="slider-animation slider-content-style-3 fadeinup-animated">
                            <h2 class="animated">Invention of <br>design platform</h2>
                            <h4 class="animated">Best Product With warranty </h4>
                            <a class="electro-slider-btn btn-hover" href="product-details.html">buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="electro-product-wrapper wrapper-padding pt-95 pb-45">

        <div class="container-fluid">
            <div class="section-title-4 text-center mb-40">
                <h2>Top Products</h2>
            </div>
            <div class="top-product-style">

                <div>
                    <div id="electro1">
                        <div class="custom-row-2">

                            @foreach($allProducts as $product)
                                @include('product._single_product')

                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
