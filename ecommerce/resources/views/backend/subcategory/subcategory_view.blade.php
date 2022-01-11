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
                        <h3 class="box-title">Список Подкатегорий <span class="badge badge-pill badge-danger"> {{ count($subcategories) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Категория </th>
                                    <th>Имя подкат-и EN </th>
                                    <th>Имя подкат-и RU </th>
                                    <th>Действия </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $subcategories as $item)
                                    <tr>
                                        <td>{{$item->category->category_name_en}} </td>
                                        <td>{{$item->subcategory_name_en}} </td>
                                        <td>{{$item->subcategory_name_ru}} </td>

                                        <td>
                                            <a href="{{route('subcategory.edit', $item->id)}}" class="btn btn-info"><i class="ml-5 fa fa-pencil"></i></a>
                                            <a href="{{route('subcategory.delete', $item->id)}}" class="btn btn-danger" id="delete"><i class="ml-5 fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Категория </th>
                                    <th>Имя подкат-и EN </th>
                                    <th>Имя подкат-и RU </th>
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
                        <h3 class="box-title">Добавить  Подкатегорию</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <form  method="post" action="{{route('subcategory.store')}}"  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Имя категории <span class="text-danger">*</span></h5>
                                    <div class="controls">
{{--                                        <input type="text" id="category_name_en" name="category_name_en" class="form-control"    >--}}

                                        <select name="category_id"   class="form-control" >
                                            <option value="" selected="" disabled="">Выбрать Категорию</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                            @endforeach
                                        </select>

                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


                                <div class="form-group">
                                    <h5>Имя подкатегории English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="subcategory_name_en" name="subcategory_name_en" class="form-control"    >

                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Имя подкатегории Русский<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_ru" name="subcategory_name_ru" class="form-control"    >
                                            @error('subcategory_name_ru')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded  btn-info">Добавить подкатегорию</button>
                                    </div>
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



