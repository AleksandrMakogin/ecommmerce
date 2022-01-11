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
                        <h3 class="box-title">Редактировать Подкатегорию1</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <form  method="post" action="{{route('subsubcategory.update', $subsubcategories->id)}}"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$subsubcategories->id}}">

                                <h5>Катеогрия<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id"   class="form-control" >
                                        <option value="" selected="" disabled="">Выбрать категорию</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"{{$category->id == $subsubcategories->category_id ? 'selected' : ''}}>{{$category->category_name_en}}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <h5>Подкатеогрия<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" class="form-control"  >
                                        <option value="" selected="" disabled="">Select SubCategory</option>

                                        @foreach($subcategories as $subsub)
                                            <option value="{{ $subsub->id }}" {{ $subsub->id == $subsubcategories->subcategory_id ? 'selected':'' }} >{{ $subsub->subcategory_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Имя подкатегории1 English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="subsubcategory_name_en" name="subsubcategory_name_en" class="form-control"  value="{{$subsubcategories->subsubcategory_name_en}}"  >

                                        @error('subsubcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Имя подкатегории1 Русский<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subsubcategory_name_ru" name="subsubcategory_name_ru" class="form-control" value="{{$subsubcategories->subsubcategory_name_ru}}"     >
                                            @error('subsubcategory_name_ru')
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


