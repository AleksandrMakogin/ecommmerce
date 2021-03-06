@extends('frontend.main_master')

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Главная</a></li>
                    <li class='active'>Авторизоватся</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Забыли пароль </h4>
                        <p class="">Сделать страрый пароль неактивным</p>


                        <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="email">Email адрес <span>*</span></label>
                                <input type="email" name="email" id="email" class="form-control unicase-form-control text-input"  >
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Сброс пароля </button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->			</div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brends')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection

