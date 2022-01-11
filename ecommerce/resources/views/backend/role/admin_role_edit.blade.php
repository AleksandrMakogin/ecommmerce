@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Обновить Админ-Пользователя </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data" >
                                @csrf

                                <input type="hidden" name="id" value="{{ $adminuser->id }}">
                                <input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">



                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Имя Админ -Пользователя  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{ $adminuser->name }}" > </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->



                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Админ Email  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" value="{{ $adminuser->email }}" > </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                        </div>	<!-- end row 	 -->




                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Телефон Админ - Пользователя  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone" class="form-control" value="{{ $adminuser->phone }}" > </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->





                                        </div>	<!-- end row 	 -->







                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Фото   <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
                                                </div>
                                            </div><!-- end cold md 6 -->

                                            <div class="col-md-6">
                                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">

                                            </div><!-- end cold md 6 -->
                                        </div><!-- end row 	 -->



                                        <hr>



                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $adminuser->brands == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_2">Бренд</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="category" value="1" {{ $adminuser->category == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_3">Категория</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="product" value="1" {{ $adminuser->products == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_4">Продукт</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $adminuser->slider == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_5">Слайдер</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $adminuser->coupons == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_6">Купон</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_7" name="shipping" value="1" {{ $adminuser->shipping == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_7">Доставка</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $adminuser->blog == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_8">Блог</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $adminuser->setting == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_9">Настройки</label>
                                                        </fieldset>


                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_10" name="returnorder" value="1" {{ $adminuser->returnorder == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_10">Возвраты</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_11" name="review" value="1" {{ $adminuser->review == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_11">	Отзывы</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_12" name="orders" value="1" {{ $adminuser->orders == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_12">Заказы</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $adminuser->stock == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_13">Запасы</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_14" name="reports" value="1" {{ $adminuser->reports == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_14">Отчеты</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_15" name="alluser" value="1" {{ $adminuser->alluser == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_15">Все Пользователи</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_16" name="adminuserrole" value="1" {{ $adminuser->adminuserrole == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_16">Админ Роль</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Обновить Админ - Пользователя">
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

        </section>



    </div>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection
