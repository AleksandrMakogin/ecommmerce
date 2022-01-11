@php
    $setting = App\Models\SiteSetting::find(1);
@endphp

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<header    id="gradient" class=" header-style-1  ">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown " >
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account ">
                    <ul class="list-unstyled ">


{{--                        <li><a href="#"><i class="icon fa fa-user"></i>@if(session()->get('language') == 'russian') Мой Акаунт @else My account @endif </a></li>--}}
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>@if(session()->get('language') == 'russian') Список желаемых покупок @else Wishlist @endif </a></li>
                        <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>@if(session()->get('language') == 'russian') Моя Корзина @else My Cart @endif </a></li>
{{--                        <li><a href="#"><i class="icon fa fa-check"></i>@if(session()->get('language') == 'russian') Проверить @else Checkout @endif </a></li>--}}

                        @auth
                            <li><a href="{{route('login')}}"><i class="icon fa fa-user"></i>@if(session()->get('language') == 'russian')Профиль пользователя @else User Profile @endif </a></li> </a></li>
                        @else
                            <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i> @if(session()->get('language') == 'russian')Войти/Зарегистрироватся @else Login/Register @endif</a></li>

                        @endauth
                        <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i class="icon fa fa-check"></i>Order Traking</a></li>



                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                      @if(session()->get('language') == 'russian') Выбрать язык @else Language @endif
                                     </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">


                                @if(session()->get('language') == 'russian')
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('russian.language') }}">Русский</a></li>
                                @endif

                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div id="logo" class="col-xs-12 col-sm-12 col-md-3 logo-holder mb-3">

                    <!-- ============================================================= LOGO ============================================================= -->
                    @php
                        $setting = \App\Models\SiteSetting::find(1);
                    @endphp
                    @if(session()->get('language') == 'russian')


                    <div class="logo " style="margin-top: -30px"> <a href="{{url('/')}}"><img src="/{{ $setting->logo }}" alt="logo"> <span  id="blink6" class="glow">  Диплом </span> </a> </div>


                    @else <div class="logo " style="margin-top: -30px"> <a href="{{url('/')}}"><img  src="/{{ $setting->logo }}" alt="logo">  <span  id="blink6" class="glow"> Diploma </span> </a> </div>
                @endif


                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= --> </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="get" action="{{ route('product.search') }}" >
                            @csrf
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu" >
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()" id="search" name="search" placeholder="Search here..." />
                                  <button class="search-button"    type="submit"  > </button>
                            </div>
                        </form>
                        <div id="searchProducts"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                <div class="total-price-basket"> <span class="lbl">
                                        @if(session()->get('language') == 'russian')
                                            корзина -
                                        @else
                                            cart -
                                        @endif
                                    </span>
                                    <span class="total-price"> <span class="sign">$</span>
                <span class="value" id="cartSubTotal"> </span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>

<!--                            // Mini Cart Start with Ajax -->

                                  <div id="miniCart">
                                </div>

                                <!--   // End Mini Cart Start with Ajax -->
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">
                                            @if(session()->get('language') == 'russian')
                                                Итого
                                            @else
                                                Total :
                                            @endif

                                        </span>
                                        <span class='price'  id="cartSubTotal">  </span> </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">
                                        @if(session()->get('language') == 'russian')
                                            Заказы
                                        @else
                                            Checkout
                                        @endif

                                    </a> </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div id="gradient1" class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                @if(session()->get('language')== 'russian')
                                    <li class="active dropdown yamm-fw"> <a href="{{route('/')}}" >Домашня страница</a> </li>
                                @else
                                    <li class="active dropdown yamm-fw"> <a href="{{route('/')}}" >Home</a> </li>
                                @endif
                                @php

                                    $categories = \App\Models\Category::orderBy('category_name_en','ASC')->get();
                               @endphp

                                @foreach($categories as $category)
                                    <li class="" > <a href="home.html" data-hover=""  class="dropdown-toggle" data-toggle="dropdown">
                                            @if(session()->get('language')== 'russian')
                                            {{ $category->category_name_ru }}</a>
                                            @else
                                            {{ $category->category_name_en }}</a>
                                            @endif
                                        <ul class="dropdown-menu container" style="width: 800px">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">

                                                        <!--   // Get SubCategory Table Data -->
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                                        @endphp

                                                        @foreach($subcategories as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                                                @if(session()->get('language') == 'russian')
                                                                    <a  class="custom-btn btn-12" href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_ru) }}">
                                                                        <span style="color: white;  " >Click!</span><span style="color: white;padding:5px">{{ $subcategory->subcategory_name_ru }}</span></a>
                                                                @else
                                                                    <a class="custom-btn btn-12" href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}">
                                                                        <span style="color: white;  " >Click!</span><span style="color: white;padding:5px">{{ $subcategory->subcategory_name_en }}</span>
                                                                    </a>

                                                                @endif
                                                                <!--   // Get SubSubCategory Table Data -->
                                                        @php
                                                        $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                                        @endphp
                                                                @foreach($subsubcategories as $subsubcategory)
                                                                    <ul class="links">
                                                                        @if(session()->get('language') == 'russian')
                                                                        <li><a  href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_ru ) }}">{{ $subsubcategory->subsubcategory_name_ru }}</a></li>
                                                                        @else
                                                                            <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en ) }}">{{ $subsubcategory->subsubcategory_name_en }}</a></li>
                                                                        @endif
                                                                    </ul>
                                                              @endforeach <!-- // End SubSubCategory Foreach -->
                                                            </div>
                                                            <!-- /.col -->
                                                    @endforeach <!-- // End SubCategory Foreach -->

                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt=""> </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach <!-- // End Category Foreach -->
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                                    <li class="dropdown  navbar-right special-menu"> <a href="{{ route('home.blog') }}"> @if(session()->get('language') == 'russian') Блог @else Blog @endif </a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- Order Traking Modal -->

    <!-- ============================================== NAVBAR : END ============================================== -->




    <script>
        function search_result_hide(){
            $("#searchProducts").slideUp();
        }
        function search_result_show(){
            $("#searchProducts").slideDown();
        }

    </script>


</header>


<style>

    .search-area{
        position: relative;
    }
    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>





<style>




    .btn-12 {
        margin: 10px;
    }
    .custom-btn {
        width: 130px;
        height: 40px;
        color: #fff;
        border-radius: 5px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
        7px 7px 20px 0px rgba(0,0,0,.1),
        4px 4px 5px 0px rgba(0,0,0,.1);
        outline: none;
    }

    .btn-12{
        position: relative;
        right: 20px;
        bottom: 20px;
        border:none;
        box-shadow: none;
        width: 130px;
        height: 40px;
        line-height: 42px;
        -webkit-perspective: 230px;
        perspective: 230px;
    }
    .btn-12 span {
        background: rgb(255, 255, 255);
        background: linear-gradient(149deg, rgb(197, 113, 194) 0%, rgba(106,57,175,1) 42%, rgba(187,24,148,1) 72%, rgba(115,53,134,1) 100%);
        display: block;
        position: absolute;
        width: 130px;
        height: 40px;
        box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
        7px 7px 20px 0px rgba(0,0,0,.1),
        4px 4px 5px 0px rgba(0,0,0,.1);
        border-radius: 5px;
        margin:0;
        text-align: center;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all .3s;
        transition: all .3s;
    }
    .btn-12 span:nth-child(1) {
        box-shadow:
            -7px -7px 20px 0px #fff9,
            -4px -4px 5px 0px #fff9,
            7px 7px 20px 0px #0002,
            4px 4px 5px 0px #0001;
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);
        transform: rotateX(90deg);
        -webkit-transform-origin: 50% 50% -20px;
        -moz-transform-origin: 50% 50% -20px;
        transform-origin: 50% 50% -20px;
    }
    .btn-12 span:nth-child(2) {
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        transform: rotateX(0deg);
        -webkit-transform-origin: 50% 50% -20px;
        -moz-transform-origin: 50% 50% -20px;
        transform-origin: 50% 50% -20px;
    }
    .btn-12:hover span:nth-child(1) {
        box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
        7px 7px 20px 0px rgba(0,0,0,.1),
        4px 4px 5px 0px rgba(0,0,0,.1);
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        transform: rotateX(0deg);
    }
    .btn-12:hover span:nth-child(2) {
        box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
        7px 7px 20px 0px rgba(0,0,0,.1),
        4px 4px 5px 0px rgba(0,0,0,.1);
        color: transparent;
        -webkit-transform: rotateX(-90deg);
        -moz-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
    }


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

    #gradient {


    background: linear-gradient(149deg, rgb(213, 214, 222) 0%, rgb(44, 59, 141) 40%, rgb(119, 128, 220) 72%, rgb(218, 40, 40) 100%);
        animation: gradient 0,1s infinite linear; // 11s - скорость анимации
    background-size: 400%; // Можно менять и подбирать интенсивность
    }

    @keyframes gradient {
        0% {
            background-position: 80% 0%;
        }
        50% {
            background-position: 20% 100%;
        }
        100% {
            background-position: 80% 0%;
        }
    }






    .btn{
        flex: 1 1 auto;
        text-align: center;
        transition: 0.5s;
        color: white;
        /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        background-image: linear-gradient(to right, #c53a9e 0%, #7780dc 51%, #be2393 100%);
    }
    .btn:hover {
        background-position: right center; /* change the direction of the change here */
    }





</style>

</style>

