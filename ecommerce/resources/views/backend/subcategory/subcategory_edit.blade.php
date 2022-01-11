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
                        <h3 class="box-title">Редактировать Подкатегорию</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <form  method="post" action="{{route('subcategory.update', $subcategories->id)}}"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$subcategories->id}}">

                                <div class="controls">
                                    <select name="category_id"   class="form-control" >
                                        <option value="" selected="" disabled="">Выбрать подкатегорию</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"{{$category->id == $subcategories->category_id ? 'selected' : ''}}>{{$category->category_name_en}}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Имя подкатегории English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="subcategory_name_en" name="subcategory_name_en" class="form-control"  value="{{$subcategories->subcategory_name_en}}"  >

                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Имя подкатегории Русский<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_ru" name="subcategory_name_ru" class="form-control" value="{{$subcategories->subcategory_name_ru}}"     >
                                            @error('subcategory_name_ru')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right ">
                                        <button type="submit" class="btn btn-rounded  btn-info">Редактировать подкатегорию</button>
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


