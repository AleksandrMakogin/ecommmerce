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
                            <h3 class="box-title">Список продуктов на складе<span class="badge badge-pill badge-danger"> {{ count($products) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Фото </th>
                                        <th>Продукт En</th>
                                        <th>Цена/шт </th>
                                        <th>Кол-во </th>
                                        <th>Вложеный актив </th>
                                        <th>Грязная выручка </th>
                                        <th>Скидка </th>
                                        <th>Продажи </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $item)
                                        <tr>
                                            <td> <img src="{{ asset($item->product_thambnail) }}" style="width: 60px; height: 50px;">  </td>
                                            <td>{{ $item->product_name_en }}</td>
                                            <td>{{ $item->selling_price }} UAH</td>
                                            <td>{{ $item->product_qty }} шт</td>
                                            <td>{{ $item->product_qty * $item->selling_price }} UAH </td>
                                            <td>{{ $item->product_qty * $item->selling_price * 0.3 }} UAH </td>

                                            <td>
                                                @if($item->discount_price == NULL)
                                                    <span class="badge badge-pill badge-danger">No Discount</span>

                                                @else
                                                    @php
                                                        $amount = $item->selling_price - $item->discount_price;
                                                        $discount = ($amount/$item->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>

                                                @endif



                                            </td>
                                            @php

                                                $orders = App\Models\OrderItem::where('product_id',$item->id)->get();
                                                   $solt = 0;
                                                foreach ($orders as $order){
                                                     $solt   += $order->qty;
                                                    }

                                            @endphp
                                            <td>
                                                      @if(empty($solt)) <span class="badge-pill badge-danger">нет продаж  </span> @else <span class="badge badge-pill badge-success">{{$solt}} шт / {{round(($solt/ $item->product_qty)*100,2)}} % / {{$solt * $item->discount_price  }} UAH </span> @endif
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
