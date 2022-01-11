
@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">

        <!-- Main content -->

            <section class="content ">
                <div class="row justify-content-center">
                    <div class="box col-8">
                        <div class="box-header with-border">
                            <h4 class="box-title">Админ Профиль </h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body col-12">
                            <div class="row">
                                <div class="col">
                                    <form  method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="form-group">
                                                    <h5>Поле для заполнения Имени<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="" value="{{$editData->name}}" data-validation-required-message="This field is required" > <div class="help-block"></div></div>
                                                </div>
                                                <div class="form-group">
                                                    <h5> Поле для заполнения Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" value="{{$editData->email}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>оле для заполнения Фото <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path" class="form-control" required="" id="Image"> <div class="help-block"></div></div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info">Обновить профиль</button>
                                        </div>


                                    </form>

                                </div>
                                <div class="box-body col-4">
                                    <div class="row">
                                        <div class="col">
                                            <img   src="{{(!empty($editData->profile_photo_path)) ? url('upload/admin_images/'. $editData->profile_photo_path) : url('upload/no_image.jpg') }}"  id="ShoweImage"/>

                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
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

    <script type="text/javascript">

        $(document).ready(function (){
            $('#Image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#ShoweImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
