

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
                        <h4 class="text-center"><span class="text-primary"> Cменить  </span><strong class="text-danger" >{{\Illuminate\Support\Facades\Auth::user()->name}}</strong><span class="text-primary">
                              <b class="text-danger">пароль</b>    </span>   </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('user.password.update')}}"  >
                            @csrf

                            <div class="form-group">
                                <h5>Текущий Пароль<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="current_password" name="oldpassword" class="form-control" required=""  data-validation-required-message="This field is required" > <div class="help-block"></div></div>
                            </div>

                            <div class="form-group">
                                <h5>Новый Пароль<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="password" name="password" class="form-control" required=""  data-validation-required-message="This field is required" > <div class="help-block"></div></div>
                            </div>

                            <div class="form-group">
                                <h5>Подтверждение Пароля <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required=""  data-validation-required-message="This field is required" > <div class="help-block"></div></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger" >Обновить </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
