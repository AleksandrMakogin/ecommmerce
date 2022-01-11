@php
    $hot_deals = App\Models\Proudct::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
@endphp



                <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title ">
                        @if(session()->get('language') == 'russian')

                            &#128293; предложение
                        @else
                            &#128293;  deals
                        @endif

                    </h3>
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                        @foreach($hot_deals as $product)
                            <div class="item">
                                <div class="products">
                                    <div class="hot-deal-wrapper">
                                        <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = ($amount/$product->selling_price) * 100;
                                        @endphp
                                        @if ($product->discount_price == NULL)
                                            <div class="tag new"><span>new</span></div>
                                        @else
                                            <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>
                                                    off</span></div>
                                        @endif
                                    <div class="timing-wrapper">
                                        <div class="box-wrapper">
                                            <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                                        </div>
                                        <div class="box-wrapper">
                                            <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                                        </div>
                                        <div class="box-wrapper">
                                            <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                                        </div>
                                        <div class="box-wrapper hidden-md">
                                            <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.hot-deal-wrapper -->

                                <div class="product-info text-left m-t-20">
                                    <h3 class="name"><a href="detail.html">
                                            @if(session()->get('language') == 'russian') {{ $product->product_name_ru }} @else {{ $product->product_name_en }} @endif</a></h3>
                                        </a></h3>
                                    <div class="rating rateit-small"></div>
                                    @if ($product->discount_price == NULL)
                                        <div class="product-price"> <span class="price"> {{ $product->selling_price }} UAH</span>  </div>
                                    @else
                                        <div class="product-price"> <span class="price"> ${{ $product->discount_price }} UAH </span> <span class="price-before-discount">${{ $product->selling_price }} UAH</span> </div>
                                @endif
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->

                                    <div class="cart clearfix animate-effect ">
                                        <div class="action " style="margin-left: 60px">
                                            <ul class="list-unstyled">


                                                <button class="btn btn-primary icon buton_cart" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>




                                                <button class="btn btn-primary icon buton_cart" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button> </a> </li>

                                                {{--            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>--}}
                                            </ul>
                                        </div>

                                    </div>
                                <!-- /.cart -->
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <!-- /.sidebar-widget -->
                </div>
