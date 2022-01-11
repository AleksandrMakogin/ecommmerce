

@extends('frontend.main_master')

@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                 @include('frontend.common.user_sidebar')

                <div class="col-md-2">

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h4 class="text-center"><span class="text-primary">Здравсвуйте... </span><strong class="text-danger" >{{\Illuminate\Support\Facades\Auth::user()->name}}</strong><span class="text-primary">
                                добро пожаловать в интеренет магазин  <b class="text-danger">Дипломная работа</b>    </span>   </h4>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
