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

                <div id="media_quiry" class="d-lg-flex justify-content-lg-between">



                    <div class="col-md-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Список Брендов  <span class="badge badge-pill badge-danger"> {{ count($brands) }} </span></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Имя бренда EN </th>
                                            <th>Имя бренда Ru </th>
                                            <th>Фото</th>
                                            <th>Действия </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $brands as $item)
                                        <tr>

                                            <td>{{$item->brand_name_en}} </td>
                                            <td>{{$item->brand_name_ru}} </td>
                                            <td><img src="{{asset($item->brand_image)}}" style="width: 70px"; height="40px"></td>
                                            <td>
                                                <a href="{{route('brand.edit', $item->id)}}" class="btn btn-info"><i class="ml-5 fa fa-pencil"></i></a>
                                                <a href="{{route('brand.delete', $item->id)}}" class="btn btn-danger" id="delete"><i class="ml-5 fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Имя бренда EN </th>
                                            <th>Имя бренда Ru </th>
                                            <th>Фото</th>
                                            <th>Действия </th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-auto">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Добавить Бренд</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="">
                                    <form  method="post" action="{{route('store')}}"  enctype="multipart/form-data">
                                        @csrf


                                                <div class="form-group">
                                                    <h5>Имя брена English<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="brand_name_en" name="brand_name_en" class="form-control"    >

                                                         @error('brand_name_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                </div>

                                                <div class="form-group">
                                                    <h5>Имя брена Русский<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="brand_name_ru" name="brand_name_ru" class="form-control"    >
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





                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded  btn-info">Добавить бренд</button>
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

