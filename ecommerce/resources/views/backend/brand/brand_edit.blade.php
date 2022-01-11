@extends('admin.admin_master')

@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-md-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">

                </div>
            </div>
        </div>


        <!-- Main content -->

        <div id="media_quiry" class="d-lg-flex justify-content-lg-center">



            <!-- /.col -->
            <div class="col-lg-auto">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактировать  Бренд</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <form  method="post" action="{{route('brand.update', $brands->id)}}"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$brands->id}}">
                                <input type="hidden" name="old_image" value="{{$brands->brand_image}}">


                                <div class="form-group">
                                    <h5>Имя брена English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="brand_name_en" name="brand_name_en" class="form-control"  value="{{$brands->brand_name_en}}"  >

                                        @error('brand_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Имя брена Русский<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="brand_name_ru" name="brand_name_ru" class="form-control" value="{{$brands->brand_name_ru}}"     >
                                            @error('brand_name_ru')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Фото бренда  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="brand_image" name="brand_image" class="form-control"    >
                                            @error('brand_image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <img src="{{asset($brands->brand_image)}}" style="height: 100px;width: 100px">
                                    </div>



                                    <div class="text-xs-right ">
                                        <button type="submit" class="btn btn-rounded  btn-info">Редактировать бренд</button>
                                    </div>
                                </div>

                            </form>



                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->

        <!-- /.content -->

    </div>

    <!-- /.content-wrapper -->

@endsection


