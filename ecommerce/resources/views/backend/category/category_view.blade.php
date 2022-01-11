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
                        <h3 class="box-title">Список Категорий  <span class="badge badge-pill badge-danger"> {{ count($categories) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Имя Категории EN </th>
                                    <th>Имя Категории RU </th>
                                    <th>Icon</th>
                                    <th>Действия </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $categories as $item)
                                    <tr>

                                        <td>{{$item->category_name_en}} </td>
                                        <td>{{$item->category_name_ru}} </td>
                                        <td><span><i style="font-size: 60px" class="{{$item->category_icon}}"></i></span></td>
                                        <td>
                                            <a href="{{route('category.edit', $item->id)}}" class="btn btn-info"><i class="ml-5 fa fa-pencil"></i></a>
                                            <a href="{{route('category.delete', $item->id)}}" class="btn btn-danger" id="delete"><i class="ml-5 fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Имя Категории EN </th>
                                    <th>Имя Категории RU </th>
                                    <th>Icon</th>
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
                        <h3 class="box-title">Добавить Категорию </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <form  method="post" action="{{route('category.store')}}"  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <h5>Имя категории English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_en" name="category_name_en" class="form-control"    >

                                        @error('category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Имя категории Русский<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_name_ru" name="category_name_ru" class="form-control"    >
                                            @error('category_name_ru')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Icon катеогрии  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_icon" name="category_icon" class="form-control"    >
                                            @error('category_icon')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>





                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded  btn-info">Добавить категорию</button>
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


