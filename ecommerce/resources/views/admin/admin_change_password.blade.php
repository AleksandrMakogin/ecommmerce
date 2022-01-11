
@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">

        <!-- Main content -->

        <section class="content ">
            <div class="row justify-content-center">
                <div class="box col-6">
                    <div class="box-header with-border">
                        <h4 class="box-title">Админ Пароль </h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body col-12">
                        <div class="row">
                            <div class="col">
                                <form  method="POST" action="{{route('update.change.password')}}" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

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
{{--                                            <div class="form-group">--}}
{{--                                                <h5> Поле для заполнения Email <span class="text-danger">*</span></h5>--}}
{{--                                                <div class="controls">--}}
{{--                                                    <input type="email" name="email" class="form-control"  required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>--}}
{{--                                            </div>--}}

                                        </div>
                                    </div>



                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Сменить пароль</button>
                                    </div>


                                </form>

                            </div>

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- Basic Forms -->


        </section>

        <!-- /.content -->
    </div>



@endsection
