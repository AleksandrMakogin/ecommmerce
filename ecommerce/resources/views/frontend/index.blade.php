


@extends('frontend.main_master')

@section('content')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- === == TOP NAVIGATION == ==== -->
            @include('frontend.common.vertical_menu')
            <!-- ===== ==== TOP NAVIGATION : END ==== ===== -->

                <!-- ============================================== HOT DEALS ============================================== -->


                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div  class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'russian')
                            СПЕЦПРЕДЛОЖЕНИЕ
                        @else
                            Special Offer
                        @endif

                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    <div class="product">
                                        @foreach($special_offer as $product)
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'russian') {{ $product->product_name_ru }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"> <span class="price"> {{ $product->selling_price }} UAH </span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        @endforeach <!-- // end special offer foreach -->
                                        <!-- /.product-micro -->

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->

            @include('frontend.common.product_tags')
                <!-- /.sidebar-widget -->
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'russian')
                            Сниженная цена
                        @else
                            Special Deals
                        @endif

                    </h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach($special_deals as $product)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}"  alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'hindi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
                                                            <!-- /.product-price -->

                                                        </div> </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                @endforeach <!-- // end special deals foreach -->
                                </div>
                            </div>



                        </div>
                    </div>



                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                <!-- ============================================== NEWSLETTER ============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                    <h3 class="section-title">Newsletters</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <p>Sign Up for Our Newsletter!</p>
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                            </div>
                            <button class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== NEWSLETTER: END ============================================== -->

                <!-- ============================================== Testimonials============================================== -->
            @include('frontend.common.testimonials')
                        <!-- /.item -->



                <!-- ============================================== Testimonials: END ============================================== -->

                <div class="home-banner"> <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
    @foreach($sliders as $slider)
        <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
            <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                    <div class=" fadeInDown-1" id="blink6"  style="font-size: 35px">{{ $slider->title }} </div>
                    <div class="excerpt fadeInDown-2 hidden-xs" > <span class="badge badge-warning" id="blink6">{{ $slider->description }} </span></div>
                    <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.item -->
    @endforeach

                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->

                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp sidebar-widget">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">@if(session()->get('language') == 'russian') Новые продукты  @else New Products @endif</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">@if(session()->get('language') == 'russian')Все  @else All @endif</a></li>

                            @foreach($categories as $category)
                                <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">@if(session()->get('language') == 'russian'){{ $category->category_name_ru }}@else{{ $category->category_name_en }}  @endif </a></li>
                            @endforeach


                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="detail.html"><img style="height: 170px"  src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                                                    <!-- /.image -->
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp


                                                    @if($amount == NULL )
                                                        <div class="tag new"><span>new</span></div>
                                                    @elseif(round($discount) == 0)
                                                        <div class="tag sale"><span>sale</span></div>
                                                    @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                    @endif
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> @if(session()->get('language') == 'russian') {{$product->product_name_ru}} @else {{$product->product_name_ru}} @endif</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price"> <span class="price">  {{$product->selling_price}} UAH  </span> <span class="price-before-discount">  @if ($amount == NULL)  @else {{$product->discount_price}} UAH @endif</span> </div>
                                                    <!-- /.product-price -->

                                                </div>

                                                   @include('frontend.common.button_add_wish_compare')

                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                   @endforeach

                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->

                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @php
                                        $catwiseProduct = \App\Models\Proudct::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp
                                     @forelse($catwiseProduct as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="detail.html"><img  style="height: 170px" src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                                                        <!-- /.image -->

                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount/$product->selling_price) * 100;
                                                        @endphp


                                                        @if($amount == NULL )
                                                            <div class="tag new"><span>new</span></div>
                                                        @elseif(round($discount) == 0)
                                                            <div class="tag sale"><span>sale</span></div>
                                                        @else
                                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                    @endif
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> @if(session()->get('language') == 'russian') {{$product->product_name_ru}} @else {{$product->product_name_ru}} @endif</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>
                                                        <div class="product-price"> <span class="price">  {{$product->selling_price}} UAH  </span> <span class="price-before-discount">  @if ($amount == NULL)  @else {{$product->discount_price}} UAH @endif</span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                </li>
                                                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    @empty

                                        <div style="padding: 10px; margin: 10px; background: #f8c52f; border-radius:3px ;text-align: center" > <span >Нет продукции в этой категории </span></div>

                                @endforelse<!--  // end all optionproduct foreach  -->

                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @endforeach



                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs sidebar-widget">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner1.jpg')}}" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner2.jpg')}}" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp sidebar-widget">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'russian')
                            Рекомендуемые товары
                        @else
                            Featured products
                        @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($featured as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img style="height: 170px" src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price) * 100;
                                            @endphp

                                            <div>
                                                @if ($product->discount_price == NULL)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                    @if(session()->get('language') == 'russian') {{ $product->product_name_ru }} @else {{ $product->product_name_en }} @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            @if ($product->discount_price == NULL)
                                                <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                                            @else
                                                <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                                        @endif


                                        <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        @include('frontend.common.button_add_wish_compare')
                                        <!-- /.cart -->
                                    </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach

                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
{{--                <div class="wide-banners wow fadeInUp outer-bottom-xs">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="wide-banner cnt-strip">--}}
{{--                                <div class="image"> <img class="img-responsive" src="{{asset('assets/images/banners/home-banner.jpg')}}" alt=""> </div>--}}
{{--                                <div class="strip strip-text">--}}
{{--                                    <div class="strip-inner">--}}
{{--
{{--                                            <span class="shopping-needs">Save up to 40% off</span></h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="new-label">--}}
{{--                                    <div class="text">NEW</div>--}}
{{--                                </div>--}}
{{--                                <!-- /.new-label -->--}}
{{--                            </div>--}}
{{--                            <!-- /.wide-banner -->--}}
{{--                        </div>--}}
{{--                        <!-- /.col -->--}}

{{--                    </div>--}}
{{--                    <!-- /.row -->--}}
{{--                </div>--}}
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BEST SELLER ============================================== -->

{{--                <div class="best-deal wow fadeInUp outer-bottom-xs">--}}
{{--                    <h3 class="section-title">Best seller</h3>--}}
{{--                    <div class="sidebar-widget-body outer-top-xs">--}}
{{--                        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">--}}
{{--                            <div class="item">--}}
{{--                                <div class="products best-product">--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-micro">--}}
{{--                                            <div class="row product-micro-row">--}}
{{--                                                <div class="col col-xs-5">--}}
{{--                                                    <div class="product-image">--}}
{{--                                                        <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p20.jpg')}}" alt=""> </a> </div>--}}
{{--                                                        <!-- /.image -->--}}

{{--                                                    </div>--}}
{{--                                                    <!-- /.product-image -->--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                                <div class="col2 col-xs-7">--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                        <div class="rating rateit-small"></div>--}}
{{--                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>--}}
{{--                                                        <!-- /.product-price -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                            </div>--}}
{{--                                            <!-- /.product-micro-row -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.product-micro -->--}}

{{--                                    </div>--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-micro">--}}
{{--                                            <div class="row product-micro-row">--}}
{{--                                                <div class="col col-xs-5">--}}
{{--                                                    <div class="product-image">--}}
{{--                                                        <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p21.jpg')}}" alt=""> </a> </div>--}}
{{--                                                        <!-- /.image -->--}}

{{--                                                    </div>--}}
{{--                                                    <!-- /.product-image -->--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                                <div class="col2 col-xs-7">--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                        <div class="rating rateit-small"></div>--}}
{{--                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>--}}
{{--                                                        <!-- /.product-price -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                            </div>--}}
{{--                                            <!-- /.product-micro-row -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.product-micro -->--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="products best-product">--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-micro">--}}
{{--                                            <div class="row product-micro-row">--}}
{{--                                                <div class="col col-xs-5">--}}
{{--                                                    <div class="product-image">--}}
{{--                                                        <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p22.jpg')}}" alt=""> </a> </div>--}}
{{--                                                        <!-- /.image -->--}}

{{--                                                    </div>--}}
{{--                                                    <!-- /.product-image -->--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                                <div class="col2 col-xs-7">--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                        <div class="rating rateit-small"></div>--}}
{{--                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>--}}
{{--                                                        <!-- /.product-price -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                            </div>--}}
{{--                                            <!-- /.product-micro-row -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.product-micro -->--}}

{{--                                    </div>--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-micro">--}}
{{--                                            <div class="row product-micro-row">--}}
{{--                                                <div class="col col-xs-5">--}}
{{--                                                    <div class="product-image">--}}
{{--                                                        <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p23.jpg')}}" alt=""> </a> </div>--}}
{{--                                                        <!-- /.image -->--}}

{{--                                                    </div>--}}
{{--                                                    <!-- /.product-image -->--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                                <div class="col2 col-xs-7">--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                        <div class="rating rateit-small"></div>--}}
{{--                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>--}}
{{--                                                        <!-- /.product-price -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                            </div>--}}
{{--                                            <!-- /.product-micro-row -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.product-micro -->--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="products best-product">--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-micro">--}}
{{--                                            <div class="row product-micro-row">--}}
{{--                                                <div class="col col-xs-5">--}}
{{--                                                    <div class="product-image">--}}
{{--                                                        <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p24.jpg')}}" alt=""> </a> </div>--}}
{{--                                                        <!-- /.image -->--}}

{{--                                                    </div>--}}
{{--                                                    <!-- /.product-image -->--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                                <div class="col2 col-xs-7">--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                        <div class="rating rateit-small"></div>--}}
{{--                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>--}}
{{--                                                        <!-- /.product-price -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                            </div>--}}
{{--                                            <!-- /.product-micro-row -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.product-micro -->--}}

{{--                                    </div>--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-micro">--}}
{{--                                            <div class="row product-micro-row">--}}
{{--                                                <div class="col col-xs-5">--}}
{{--                                                    <div class="product-image">--}}
{{--                                                        <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p25.jpg')}}" alt=""> </a> </div>--}}
{{--                                                        <!-- /.image -->--}}

{{--                                                    </div>--}}
{{--                                                    <!-- /.product-image -->--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                                <div class="col2 col-xs-7">--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                        <div class="rating rateit-small"></div>--}}
{{--                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>--}}
{{--                                                        <!-- /.product-price -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                            </div>--}}
{{--                                            <!-- /.product-micro-row -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.product-micro -->--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="item">--}}
{{--                                <div class="products best-product">--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-micro">--}}
{{--                                            <div class="row product-micro-row">--}}
{{--                                                <div class="col col-xs-5">--}}
{{--                                                    <div class="product-image">--}}
{{--                                                        <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p26.jpg')}}" alt=""> </a> </div>--}}
{{--                                                        <!-- /.image -->--}}

{{--                                                    </div>--}}
{{--                                                    <!-- /.product-image -->--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                                <div class="col2 col-xs-7">--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                        <div class="rating rateit-small"></div>--}}
{{--                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>--}}
{{--                                                        <!-- /.product-price -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                            </div>--}}
{{--                                            <!-- /.product-micro-row -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.product-micro -->--}}

{{--                                    </div>--}}
{{--                                    <div class="product">--}}
{{--                                        <div class="product-micro">--}}
{{--                                            <div class="row product-micro-row">--}}
{{--                                                <div class="col col-xs-5">--}}
{{--                                                    <div class="product-image">--}}
{{--                                                        <div class="image"> <a href="#"> <img src="{{asset('frontend/assets/images/products/p27.jpg')}}" alt=""> </a> </div>--}}
{{--                                                        <!-- /.image -->--}}

{{--                                                    </div>--}}
{{--                                                    <!-- /.product-image -->--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                                <div class="col2 col-xs-7">--}}
{{--                                                    <div class="product-info">--}}
{{--                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>--}}
{{--                                                        <div class="rating rateit-small"></div>--}}
{{--                                                        <div class="product-price"> <span class="price"> $450.99 </span> </div>--}}
{{--                                                        <!-- /.product-price -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.col -->--}}
{{--                                            </div>--}}
{{--                                            <!-- /.product-micro-row -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.product-micro -->--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.sidebar-widget-body -->--}}
{{--                </div>--}}
                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->

{{--                <!-- ============================================== BLOG SLIDER ============================================== -->--}}
{{--                <section class="section latest-blog outer-bottom-vs wow fadeInUp">--}}
{{--                    <h3 class="section-title">latest form blog</h3>--}}
{{--                    <div class="blog-slider-container outer-top-xs">--}}
{{--                        <div class="owl-carousel blog-slider custom-carousel">--}}
{{--                            @foreach($blogpost as $blog)--}}
{{--                            <div class="item">--}}
{{--                                <div class="blog-post">--}}
{{--                                    <div class="blog-post-image">--}}
{{--                                        <div class="image"> <a href="blog.html"><img src="{{ asset($blog->post_image) }}" alt=""></a> </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.blog-post-image -->--}}

{{--                                    <div class="blog-post-info text-left">--}}
{{--                                        <h3 class="name"><a href="#">@if(session()->get('language') == 'russian') {{ $blog->post_title_ru }} @else {{ $blog->post_title_en }} @endif</a></h3>--}}


{{--                                        <span class="info">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>--}}

{{--                                        <p class="text">@if(session()->get('language') == 'russian') {!! Str::limit($blog->post_details_ru, 100 )  !!} @else {!! Str::limit($blog->post_details_en, 100 )  !!} @endif</p>--}}


{{--                                        <a href="{{ route('post.details',$blog->id) }}" class="lnk btn btn-primary">Read more</a> </div>--}}
{{--                                    <!-- /.blog-post-info -->--}}

{{--                                </div>--}}
{{--                                <!-- /.blog-post -->--}}
{{--                            </div>--}}
{{--                           @endforeach--}}
{{--                            <!-- /.item -->--}}



{{--                        </div>--}}
{{--                        <!-- /.owl-carousel -->--}}
{{--                    </div>--}}
{{--                    <!-- /.blog-slider-container -->--}}
{{--                </section>--}}
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
{{--                <section class="section wow fadeInUp new-arriavls">--}}
{{--                    <h3 class="section-title">New Arrivals</h3>--}}
{{--                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">--}}
{{--                        <div class="item item-carousel">--}}
{{--                            <div class="products">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p19.jpg')}}" alt=""></a> </div>--}}
{{--                                        <!-- /.image -->--}}

{{--                                        <div class="tag new"><span>new</span></div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.product-image -->--}}

{{--                                    <div class="product-info text-left">--}}
{{--                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>--}}
{{--                                        <div class="rating rateit-small"></div>--}}
{{--                                        <div class="description"></div>--}}
{{--                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>--}}
{{--                                        <!-- /.product-price -->--}}

{{--                                    </div>--}}
{{--                                    <!-- /.product-info -->--}}
{{--                                    <div class="cart clearfix animate-effect">--}}
{{--                                        <div class="action">--}}
{{--                                            <ul class="list-unstyled">--}}
{{--                                                <li class="add-cart-button btn-group">--}}
{{--                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>--}}
{{--                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>--}}
{{--                                                </li>--}}
{{--                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>--}}
{{--                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.action -->--}}
{{--                                    </div>--}}
{{--                                    <!-- /.cart -->--}}
{{--                                </div>--}}
{{--                                <!-- /.product -->--}}

{{--                            </div>--}}
{{--                            <!-- /.products -->--}}
{{--                        </div>--}}
{{--                        <!-- /.item -->--}}

{{--                        <div class="item item-carousel">--}}
{{--                            <div class="products">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p28.jpg')}}" alt=""></a> </div>--}}
{{--                                        <!-- /.image -->--}}

{{--                                        <div class="tag new"><span>new</span></div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.product-image -->--}}

{{--                                    <div class="product-info text-left">--}}
{{--                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>--}}
{{--                                        <div class="rating rateit-small"></div>--}}
{{--                                        <div class="description"></div>--}}
{{--                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>--}}
{{--                                        <!-- /.product-price -->--}}

{{--                                    </div>--}}
{{--                                    <!-- /.product-info -->--}}
{{--                                    <div class="cart clearfix animate-effect">--}}
{{--                                        <div class="action">--}}
{{--                                            <ul class="list-unstyled">--}}
{{--                                                <li class="add-cart-button btn-group">--}}
{{--                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>--}}
{{--                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>--}}
{{--                                                </li>--}}
{{--                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>--}}
{{--                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.action -->--}}
{{--                                    </div>--}}
{{--                                    <!-- /.cart -->--}}
{{--                                </div>--}}
{{--                                <!-- /.product -->--}}

{{--                            </div>--}}
{{--                            <!-- /.products -->--}}
{{--                        </div>--}}
{{--                        <!-- /.item -->--}}

{{--                        <div class="item item-carousel">--}}
{{--                            <div class="products">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p30.jpg')}}" alt=""></a> </div>--}}
{{--                                        <!-- /.image -->--}}

{{--                                        <div class="tag hot"><span>hot</span></div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.product-image -->--}}

{{--                                    <div class="product-info text-left">--}}
{{--                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>--}}
{{--                                        <div class="rating rateit-small"></div>--}}
{{--                                        <div class="description"></div>--}}
{{--                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>--}}
{{--                                        <!-- /.product-price -->--}}

{{--                                    </div>--}}
{{--                                    <!-- /.product-info -->--}}
{{--                                    <div class="cart clearfix animate-effect">--}}
{{--                                        <div class="action">--}}
{{--                                            <ul class="list-unstyled">--}}
{{--                                                <li class="add-cart-button btn-group">--}}
{{--                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>--}}
{{--                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>--}}
{{--                                                </li>--}}
{{--                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>--}}
{{--                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.action -->--}}
{{--                                    </div>--}}
{{--                                    <!-- /.cart -->--}}
{{--                                </div>--}}
{{--                                <!-- /.product -->--}}

{{--                            </div>--}}
{{--                            <!-- /.products -->--}}
{{--                        </div>--}}
{{--                        <!-- /.item -->--}}

{{--                        <div class="item item-carousel">--}}
{{--                            <div class="products">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p1.jpg')}}" alt=""></a> </div>--}}
{{--                                        <!-- /.image -->--}}

{{--                                        <div class="tag hot"><span>hot</span></div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.product-image -->--}}

{{--                                    <div class="product-info text-left">--}}
{{--                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>--}}
{{--                                        <div class="rating rateit-small"></div>--}}
{{--                                        <div class="description"></div>--}}
{{--                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>--}}
{{--                                        <!-- /.product-price -->--}}

{{--                                    </div>--}}
{{--                                    <!-- /.product-info -->--}}
{{--                                    <div class="cart clearfix animate-effect">--}}
{{--                                        <div class="action">--}}
{{--                                            <ul class="list-unstyled">--}}
{{--                                                <li class="add-cart-button btn-group">--}}
{{--                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>--}}
{{--                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>--}}
{{--                                                </li>--}}
{{--                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>--}}
{{--                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.action -->--}}
{{--                                    </div>--}}
{{--                                    <!-- /.cart -->--}}
{{--                                </div>--}}
{{--                                <!-- /.product -->--}}

{{--                            </div>--}}
{{--                            <!-- /.products -->--}}
{{--                        </div>--}}
{{--                        <!-- /.item -->--}}

{{--                        <div class="item item-carousel">--}}
{{--                            <div class="products">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p2.jpg')}}" alt=""></a> </div>--}}
{{--                                        <!-- /.image -->--}}

{{--                                        <div class="tag sale"><span>sale</span></div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.product-image -->--}}

{{--                                    <div class="product-info text-left">--}}
{{--                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>--}}
{{--                                        <div class="rating rateit-small"></div>--}}
{{--                                        <div class="description"></div>--}}
{{--                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>--}}
{{--                                        <!-- /.product-price -->--}}

{{--                                    </div>--}}
{{--                                    <!-- /.product-info -->--}}
{{--                                    <div class="cart clearfix animate-effect">--}}
{{--                                        <div class="action">--}}
{{--                                            <ul class="list-unstyled">--}}
{{--                                                <li class="add-cart-button btn-group">--}}
{{--                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>--}}
{{--                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>--}}
{{--                                                </li>--}}
{{--                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>--}}
{{--                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.action -->--}}
{{--                                    </div>--}}
{{--                                    <!-- /.cart -->--}}
{{--                                </div>--}}
{{--                                <!-- /.product -->--}}

{{--                            </div>--}}
{{--                            <!-- /.products -->--}}
{{--                        </div>--}}
{{--                        <!-- /.item -->--}}

{{--                        <div class="item item-carousel">--}}
{{--                            <div class="products">--}}
{{--                                <div class="product">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <div class="image"> <a href="detail.html"><img  src="{{asset('frontend/assets/images/products/p3.jpg')}}" alt=""></a> </div>--}}
{{--                                        <!-- /.image -->--}}


{{--                                        <div class="tag sale"><span>sale</span></div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.product-image -->--}}

{{--                                    <div class="product-info text-left">--}}
{{--                                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>--}}
{{--                                        <div class="rating rateit-small"></div>--}}
{{--                                        <div class="description"></div>--}}
{{--                                        <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>--}}
{{--                                        <!-- /.product-price -->--}}

{{--                                    </div>--}}
{{--                                    <!-- /.product-info -->--}}
{{--                                    <div class="cart clearfix animate-effect">--}}
{{--                                        <div class="action">--}}
{{--                                            <ul class="list-unstyled">--}}
{{--                                                <li class="add-cart-button btn-group">--}}
{{--                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>--}}
{{--                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>--}}
{{--                                                </li>--}}
{{--                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>--}}
{{--                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.action -->--}}
{{--                                    </div>--}}
{{--                                    <!-- /.cart -->--}}
{{--                                </div>--}}
{{--                                <!-- /.product -->--}}

{{--                            </div>--}}
{{--                            <!-- /.products -->--}}
{{--                        </div>--}}
{{--                        <!-- /.item -->--}}
{{--                    </div>--}}
{{--                    <!-- /.home-owl-carousel -->--}}
{{--                </section>--}}
                <!-- /.section -->


                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- -- == === skip_product_0 PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp sidebar-widget">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'russian') {{ $skip_category_0->category_name_ru }} @else {{ $skip_category_0->category_name_en }} @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                        @foreach($skip_product_0 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img style="height: 170px"  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price) * 100;
                                            @endphp

                                            <div>
                                                @if ($product->discount_price == NULL)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                    @if(session()->get('language') == 'russian') {{ $product->product_name_ru }} @else {{ $product->product_name_en }} @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            @if ($product->discount_price == NULL)
                                                <div class="product-price"> <span class="price"> {{ $product->selling_price }} UAH </span>  </div>
                                            @else
                                                <div class="product-price"> <span class="price"> {{ $product->discount_price }} UAH</span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                                        @endif


                                        <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                       @include('frontend.common.button_add_wish_compare')
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.home-owl-carousel -->
                </section>

                <!-- == === skip_product_1 PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp sidebar-widget">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'russian') {{ $skip_category_1->category_name_ru }} @else {{ $skip_category_1->category_name_en }} @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                        @foreach($skip_product_1 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img style="height: 170px" src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price) * 100;
                                            @endphp

                                            <div>
                                                @if ($product->discount_price == NULL)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                    @if(session()->get('language') == 'russian') {{ $product->product_name_ru }} @else {{ $product->product_name_en }} @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            @if ($product->discount_price == NULL)
                                                <div class="product-price"> <span class="price"> {{ $product->selling_price }} UAH </span>  </div>
                                            @else
                                                <div class="product-price"> <span class="price"> {{ $product->discount_price }} UAH </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                                        @endif


                                        <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        @include('frontend.common.button_add_wish_compare')
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.home-owl-carousel -->
                </section>

                <!-- == === skip_brand_product_1 PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp sidebar-widget">
                    <h3 class="section-title">
                        @if(session()->get('language') == 'russian') {{ $skip_brand_1->brand_name_ru }} @else {{ $skip_brand_1->brand_name_en }} @endif
                    </h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                        @foreach($skip_brand_product_1 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img style="height: 170px" src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                                            <!-- /.image -->

                                            @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount/$product->selling_price) * 100;
                                            @endphp

                                            <div>
                                                @if ($product->discount_price == NULL)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                    @if(session()->get('language') == 'russian') {{ $product->product_name_ru }} @else {{ $product->product_name_en }} @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            @if ($product->discount_price == NULL)
                                                <div class="product-price"> <span class="price"> {{ $product->selling_price }} UAH</span>  </div>
                                            @else
                                                <div class="product-price"> <span class="price"> {{ $product->discount_price }} UAH </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                                        @endif


                                        <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        @include('frontend.common.button_add_wish_compare')
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp sidebar-widget">
                    <h3 class="section-title">@if(session()->get('language') == 'russian') Последние блоги @else latest form blog @endif</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            @foreach($blogpost as $blog)
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img src="{{ asset($blog->post_image) }}" alt=""></a> </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">@if(session()->get('language') == 'russian') {{ $blog->post_title_ru }} @else {{ $blog->post_title_en }} @endif</a></h3>


                                            <span class="info">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>

                                            <p class="text">@if(session()->get('language') == 'russian') {!! Str::limit($blog->post_details_ru, 100 )  !!} @else {!! Str::limit($blog->post_details_en, 100 )  !!} @endif</p>


                                            <a href="{{ route('post.details',$blog->id) }}" class="lnk btn btn-primary"> @if(session()->get('language') == 'russian')Больше инфо @else Read more  @endif</a> </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                        @endforeach
                        <!-- /.item -->



                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- == ==== skip_brand_product_1 PRODUCTS : END ==== === -->
                <!-- /.section -->
                <!-- == ==== skip_product_1 PRODUCTS : END ==== === -->
                <!-- /.section -->
                <!-- == ==== skip_product_0 PRODUCTS : END ==== === -->
            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brends')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->

</div>


@endsection


<style>


    /*#logo {*/
    /*    background-color: black;*/
    /*    font-family: cursive;*/
    /*}*/

    .glow {
        font-size: 40px;


        color: #ffd737;
        text-align: center;
        -webkit-animation: glow 1s ease-in-out infinite alternate;
        -moz-animation: glow 1s ease-in-out infinite alternate;
        animation: glow 1s ease-in-out infinite alternate;

        text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;


    }

    @-webkit-keyframes glow {
        from {
            text-shadow: 0 0 10px #fff, 0 0 20px #83e3eb, 0 0 30px #4d8bff, 0 0 40px #4d74ff, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
        }

        to {
            text-shadow: 0 0 20px #fff, 0 0 30px #c9ebed, 0 0 40px #e7e3e0, 0 0 50px #f7e4e3, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
        }
    }


    @-webkit-keyframes blink6 {
        10% { transform: scale(1, 1) rotate(80deg); }
        20% { transform: scale(0, 0) rotate(160deg); }
        100% { transform: scale(0, 0) rotate(0deg); }
    }
    @keyframes blink6 {
        10% { transform: scale(1, 1) rotate(80deg); }
        20% { transform: scale(0, 0) rotate(160deg); }
        100% { transform: scale(0, 0) rotate(0deg); }
    }
    #blink6 {
        position: relative;
        display: inline-block;
        color: #fff;
        text-shadow: 0 0 10px #3d7a97;

    }
    #blink6:after, #blink6:before {
        content: "";
        position: absolute; top: 0; left: 0;
        display: block;
        width: 100px;
        height: 100px;
        background-image:
            radial-gradient(rgba(255,255,255,1), rgba(255,255,255,0) 30%),
            linear-gradient(45deg, rgba(0,0,0,0) 49%, rgba(255,255,255,.4) 50%, rgba(0,0,0,0) 51%),
            linear-gradient(135deg, rgba(0,0,0,0) 49%, rgba(255,255,255,.4) 50%, rgba(0,0,0,0) 51%);
        -webkit-animation: blink6 10s linear infinite;
        animation: blink6 10s linear infinite;
        transform: scale(0, 0) rotate(0deg);
    }
    #blink6:before {
        top: -30%;
        right: 0;
        left: auto;
        -webkit-animation-delay: 5s;
        animation-delay: 5s;
    }

    /*#product-tabs-slider*/
    /*{*/
    /*    box-shadow: 0 0 16px #7780dc;*/
    /*    border-radius: 10px;*/
    /*    border: 1px solid;*/
    /*    border-color: #bb18b8;*/
    /*}*/


</style>











