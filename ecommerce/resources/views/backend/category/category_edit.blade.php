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
                        <h3 class="box-title">Редактировать  Категорию</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <form  method="post" action="{{route('category.update', $categories->id)}}"  enctype="multipart/form-data">
                                @csrf
{{--                                <input type="hidden" name="id" value="{{$categories->id}}">--}}
                                <input type="hidden" name="old_icon" value="{{$categories->category_icon}}">


                                <div class="form-group">
                                    <h5>Имя категории English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_en" name="category_name_en" class="form-control"  value="{{$categories->category_name_en}}"  >

                                        @error('category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Имя категории Русский<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_name_ru" name="category_name_ru" class="form-control" value="{{$categories->category_name_ru}}"     >
                                            @error('category_name_ru')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Icon категории  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id=category_icon" name="category_icon" class="form-control"  value="{{$categories->category_icon}}"   >
                                            @error('category_icon')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <span ><i style="font-size: 60px" class="{{$categories->category_icon}}" ></i></span>
                                    </div>

                                    <div class="text-xs-right ">
                                        <button type="submit" class="btn btn-rounded  btn-info">Редактировать категорию</button>
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


