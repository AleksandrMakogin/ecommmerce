@extends('frontend.main_master')

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
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
                        <h4 class="">Войти </h4>
                        <p class="">Привет, Добро пожаловать в Ваш акаунт.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Войти с Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Войти с Twitter</a>
                        </div>

                        <form class="register-form outer-top-xs" role="form" method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                                  @csrf

                            <div class="form-group">
                                <label class="info-title" for="email">Email адрес <span>*</span></label>
                                <input type="email" name="email" id="email" class="form-control unicase-form-control text-input"  >
                            </div>


                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Пароль <span>*</span></label>
                                <input type="password" name="password" id="password" class="form-control unicase-form-control text-input"  >
                            </div>

                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Запомнить меня!
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Забыть пароль?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Войти</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle"> Создать новый акаунт.</h4>


                        <form  method="POST" action="{{ route('register') }}" class="register-form outer-top-xs" role="form">
                          @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Имя <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" >
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email адрес <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" >
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Номер телефона <span>*</span></label>
                                <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" >
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">Пароль <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Подтверждение пароля  <span>*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input"  >
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Создать </button>
                        </form>


                    </div>
                    <!-- create a new account -->			</div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
             @include('frontend.body.brends')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection
