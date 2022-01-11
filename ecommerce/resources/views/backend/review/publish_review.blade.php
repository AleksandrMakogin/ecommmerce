@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Публикация всех отзывов </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Краткий отзыв</th>
                                        <th>Комент </th>
                                        <th>Пользователь  </th>
                                        <th>Продукт  </th>
                                        <th>Стутус </th>
                                        <th>Действия</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($review as $item)
                                        <tr>
                                            <td> {{ $item->summary }}  </td>
                                            <td> {{ $item->comment }}  </td>
                                            <td>  {{ $item->user->name }}  </td>

                                            <td> {{ $item->product->product_name_en }}  </td>
                                            <td>
                                                @if($item->status == 0)
                                                    <span class="badge badge-pill badge-primary">В ожылании  </span>
                                                @elseif($item->status == 1)
                                                    <span class="badge badge-pill badge-success">Публикован </span>
                                                @endif

                                            </td>

                                            <td width="25%">
                                                <a href="{{ route('delete.review',$item->id) }}" class="btn btn-danger" id="delete">Удалить </a>
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






            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>




@endsection
