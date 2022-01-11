@extends('frontend.main_master')
@section('content')

{{--@section('title')--}}
{{--    Blog Page--}}
{{--@endsection--}}

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Blog</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9 ">



                    @foreach($blogpost as $blog)
                        <div class="blog-post  wow fadeInUp sidebar-widget">

                            <a href="blog-details.html"><img class="img-responsive" src="{{ asset($blog->post_image) }}" alt=""></a>
                            <h1><a href="{{ route('post.details',$blog->id) }}"> @if(session()->get('language') == 'russian') {{ $blog->post_title_ru }} @else {{ $blog->post_title_en }} @endif</a></h1>

                            <span class="date-time"> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>

                            <p>@if(session()->get('language') == 'russian') {!! Str::limit($blog->post_details_ru, 200 )  !!} @else {!! Str::limit($blog->post_details_en, 200 )  !!} @endif</p>
                            <a href="{{ route('post.details',$blog->id) }}" class="btn  btn-primary read-more">@if(session()->get('language') == 'russian') Больше инфо @else Read more @endif</a>
                        </div>
                    @endforeach


                    <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul><!-- /.list-inline -->
                            </div><!-- /.pagination-container -->    </div><!-- /.text-right -->
                    </div><!-- /.filters-container -->				</div>
                <div class="col-md-3 sidebar">



                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>
                                </div>
                            </form>
                        </div>

                        <div class="home-banner outer-top-n outer-bottom-xs">
{{--                            <img src="assets/images/banners/LHS-banner.jpg" alt="Image">--}}
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }} " alt="Image">
                        </div>
                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
{{--                            <h3 class="section-title">Category</h3>--}}
                            <h3 class="section-title"> @if(session()->get('language') == 'russian') Категории блогов@else  Blog Category @endif</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">

                                    @foreach($blogcategory as $category)
                                        <ul class="list-group">
                                            <a href="{{ url('blog/category/post/'.$category->id) }}"><li class="list-group-item">@if(session()->get('language') == 'russian') {{ $category->blog_category_name_ru }} @else {{ $category->blog_category_name_en }} @endif</li></a>

                                        </ul>
                                    @endforeach



                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">

                                <!-- ===== ======== CATEGORY : END ==== = -->

                                <div class="tab-pane m-t-20" id="recent">
                                    <div class="blog-post inner-bottom-30" >
                                        <img class="img-responsive" src="assets/images/blog-post/blog_big_03.jpg" alt="">
                                        <h4><a href="blog-details.html">@if(session()->get('language') == 'russian') Простой блог пост   @else Simple Blog Post @endif </a></h4>
                                        <span class="review">6 Comments</span>
                                        <span class="date-time">5/06/16</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

                                    </div>
                                    <div class="blog-post">
                                        <img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
                                        <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                        <span class="review">6 Comments</span>
                                        <span class="date-time">10/07/16</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================== PRODUCT TAGS ============================================== -->



                        <!-- === ======== PRODUCT TAGS ==== ========== -->
                        <div class="sidebar-widget product-tag wow fadeInUp">
                            <h3 class="section-title"> @if(session()->get('language') == 'russian ') Теги продуктов @else Product tags @endif  </h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div class="tag-list">
                                    <a class="item" title="Phone" href="category.html">Phone</a>
                                    <a class="item active" title="Vest" href="category.html">Vest</a>
                                    <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                                    <a class="item" title="Furniture" href="category.html">Furniture</a>
                                    <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                                    <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                                    <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                                    <a class="item" title="Toys" href="category.html">Toys</a>
                                    <a class="item" title="Rose" href="category.html">Rose</a>
                                </div><!-- /.tag-list -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
                </div>
            </div>
        </div>


    </div>


@endsection
