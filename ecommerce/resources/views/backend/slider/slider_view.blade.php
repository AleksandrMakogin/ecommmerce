@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Список слайдеров <span class="badge badge-pill badge-danger"> {{ count($sliders) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Слайдер Фото </th>
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>Статус</th>
                                        <th>Действия</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $item)
                                        <tr>

                                            <td><img src="{{ asset($item->slider_img) }}" style="width: 70px; height: 40px;"> </td>
                                            <td>
                                                @if($item->title == NULL)
                                                    <span class="badge badge-pill badge-danger"> No Title </span>
                                                @else
                                                    {{ $item->title }}
                                                @endif
                                            </td>

                                            <td>{{ $item->description }}</td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-pill badge-success"> Активный </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> Неактивный </span>
                                                @endif

                                            </td>

                                            <td width="30%">
                                                <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                                                <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>

                                                @if($item->status == 1)
                                                    <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Не аткивный сейчас"><i class="fa fa-arrow-down"></i> </a>
                                                @else
                                                    <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Активный сейчас"><i class="fa fa-arrow-up"></i> </a>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->


                <!--   ------------ Add Slider Page -------- -->


                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Добавить слайдер </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <h5>Слайдер название  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="title" class="form-control" >

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Слайдер Описание <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control" >

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <h5>Слайдер фото <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control" >
                                            @error('slider_img')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Добавиить слайдер">
                                    </div>
                                </form>





                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>




            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>




@endsection
