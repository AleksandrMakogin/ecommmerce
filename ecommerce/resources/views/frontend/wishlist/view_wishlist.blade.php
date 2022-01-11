@extends('frontend.main_master')
@section('content')




<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Wishlist</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page sidebar-widget">
            <div class="row">
                <div class="col-md-12 my-wishlist ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="4" class="heading-title">
                                    @if(session()->get('language') == 'russian')
                                        Мой список покупок
                                    @else
                                        My Wishlist
                                    @endif


                                </th>
                            </tr>
                            </thead>
                            <tbody id="wishlist">

                            </tbody>
                        </table>
                    </div>
                </div>			</div><!-- /.row -->
        </div><!-- /.sigin-in-->



        <br>
        @include('frontend.body.brends')
    </div>







@endsection
