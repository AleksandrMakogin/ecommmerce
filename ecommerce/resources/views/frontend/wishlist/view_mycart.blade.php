@extends('frontend.main_master')
@section('content')




<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>MyCart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart sidebar-widget">
                <div class="shopping-cart-table ">
                    <div class="table-responsive ">
                        <table class="table">
                            <thead>
                            <tr>
{{--                                <th colspan="4" class="heading-title">--}}
{{--                                    @if(session()->get('language') == 'russian')--}}
{{--                                       Моя корзина--}}
{{--                                    @else--}}
{{--                                       My Cart--}}
{{--                                    @endif--}}

{{--                                </th>--}}
                                <th class="cart-romove item">@if(session()->get('language') == 'russian') Фото @else Image @endif </th>
                                <th class="cart-description item">@if(session()->get('language') == 'russian') Назва @else Name @endif </th>
                                <th class="cart-product-name item">@if(session()->get('language') == 'russian') Цвет  @else Color @endif</th>
                                <th class="cart-edit item">@if(session()->get('language') == 'russian') Цвет  @else Color @endif</th>
                                <th class="cart-qty item">@if(session()->get('language') == 'russian') Колличество @else Quantity @endif</th>
                                <th class="cart-sub-total item">@if(session()->get('language') == 'russian')Итого  @else Subtotal @endif </th>
                                <th class="cart-total last-item">@if(session()->get('language') == 'russian')Удалить  @else Remove @endif </th>
                            </tr>
                            </thead>
                            <tbody id="cartPage">


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 estimate-ship-tax">
                </div>

                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    @if(Session::has('coupon'))

                    @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                <span class="estimate-title">
                                    @if(session()->get('language') == 'russian')
                                        Код скидки
                                    @else
                                        Discount Code
                                    @endif
                                </span>


                                <p>
                                    @if(session()->get('language') == 'russian')
                                        Введите Ваш купон который в наличии
                                    @else
                                        Enter your coupon code if you have one..
                                    @endif

                                </p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control unicase-form-control text-input" placeholder="Ваш купон" id="coupon_name">
                                </div>
                                <div class="clearfix pull-right">
                                    <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">
                                        @if(session()->get('language') == 'russian')
                                            Применить купон
                                        @else
                                            APPLY COUPON
                                        @endif


                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                    @endif
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-5 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead id="couponCalField">

                        </thead><!-- /thead -->
                        <tbody>
                        <tr>
                            <td>
                                <div class="cart-checkout-btn pull-right">
                                    <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">
                                        @if(session()->get('language') == 'russian')
                                             ОФОРМИТЬ ЗАКАЗ
                                        @else
                                            PROCCED TO CHEKOUT
                                        @endif
                                    </a>

                                </div>
                            </td>
                        </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->


            </div><!-- /.row -->
        </div><!-- /.sigin-in-->



        <br>
        @include('frontend.body.brends')
    </div>



@endsection
