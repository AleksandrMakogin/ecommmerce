@extends('frontend.main_master')
@section('content')


    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="x-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 x-text text-center">
                        <h1>404</h1>

                        <p>
                            @if(session()->get('language') == 'russian')
                                К сожалению страница не найдена по вашему запросу
                            @else
                                We are sorry, the page you've requested is not available.
                           @endif
                        </p>
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i>   @if(session()->get('language') == 'russian') Вернутся на домашнюю страницу @else Go To Homepage  @endif </a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->


@endsection
