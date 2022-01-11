@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')

                <div class="col-md-1">
                </div>

                <div class="col-md-10 sidebar-widget " style="margin-top: 30px">

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>

                            <tr id="gradient1" style="color: white">
                                <td class="col-md-1">
                                    <label for="">@if(session()->get('language') == 'russian') Дата @else Date @endif</label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">@if(session()->get('language') == 'russian') Итого @else Total @endif </label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">@if(session()->get('language') == 'russian') Способ оплата  @else Payment option @endif</label>
                                </td>


                                <td class="col-md-2">
                                    <label for=""> @if(session()->get('language') == 'russian') Счет @else Invoice @endif </label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">@if(session()->get('language') == 'russian') Причина @else Reason  @endif</label>
                                </td>

                                <td class="col-md-1">
                                    <label for=""> @if(session()->get('language') == 'russian')  Статус  @else Status @endif </label>
                                </td>

                            </tr>


                            @foreach($orders as $order)
                                <tr>
                                    <td class="col-md-1">
                                        <label for=""> {{ $order->order_date }}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> ${{ $order->amount }}</label>
                                    </td>


                                    <td class="col-md-3">
                                        <label for=""> {{ $order->payment_method }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> {{ $order->invoice_no }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> {{ $order->return_reason }}</label>
                                    </td>


                                    <td class="col-md-2">
                                        <label for="">
                                            @if($order->return_order == 0)
                                                <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                            @elseif($order->return_order == 1)
                                                <span class="badge badge-pill badge-warning" style="background: #800000;"> Pedding </span>
                                                <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>

                                            @elseif($order->return_order == 2)
                                                <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                            @endif
                                        </label>
                                    </td>

{{--                                     <td class="col-md-1">--}}
{{--                                        <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>  @if(session()->get('language') == 'russian') <span style="margin-left:5px ">  </span> Обзор @else View @endif </a>--}}
{{--                                        <a target="_blank"  href="{{ url('user/invoice_download/'.$order->id ) }}" style="margin-top: 5px" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color: white;"></i> @if(session()->get('language') == 'russian') Загрузить @else Invoice @endif</a>--}}

{{--                                    </td>--}}

                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div> <!-- / end col md 8 -->

            </div> <!-- // end row -->

        </div>

    </div>

@endsection
