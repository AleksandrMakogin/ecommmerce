@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                        <h3 class="box-title">Список Подкатегорий1 <span class="badge badge-pill badge-danger"> {{ count($subsubcategories) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Категория </th>
                                    <th>Подкатегория </th>
                                    <th>Имя подкат-и EN </th>
                                    <th>Имя подкат-и RU </th>
                                    <th>Действия </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $subsubcategories as $item)
                                    <tr>
                                        <td>{{$item->category->category_name_en}} </td>
                                        <td>{{$item->subcategory->subcategory_name_en}} </td>
                                        <td>{{$item->subsubcategory_name_en}} </td>
                                        <td>{{$item->subsubcategory_name_ru}} </td>

                                        <td>
                                            <div class="row">
                                                <a href="{{route('subsubcategory.edit', $item->id)}}" class="btn btn-info ml-10"><i class="ml-5 fa fa-pencil"></i></a>
                                                <a href="{{route('subsubcategory.delete', $item->id)}}" class="btn btn-danger ml-10" id="delete"><i class="ml-5 fa fa-trash"></i></a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Категория </th>
                                    <th>Подкатегория </th>
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
                        <h3 class="box-title">Добавить  Подкатегорию1</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <form  method="post" action="{{route('subsubcategory.store')}}"  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Категория <span class="text-danger">*</span></h5>
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
                                    <h5>Подкатегория <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        {{--                                        <input type="text" id="category_name_en" name="category_name_en" class="form-control"    >--}}

                                        <select name="subcategory_id"   class="form-control" >
                                            <option value="" selected="" disabled="">Выбрать Категорию</option>

                                                <option value=""></option>

                                        </select>

                                        @error('subcategory_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>Имя подкатегории1 English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subsubcategory_name_en" name="subsubcategory_name_en" class="form-control"    >

                                            @error('subsubcategory_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Имя подкатегории1 Русский<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" id="subsubcategory_name_ru" name="subsubcategory_name_ru" class="form-control"    >
                                                @error('subsubcategory_name_ru')
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection




