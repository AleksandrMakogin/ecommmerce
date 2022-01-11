@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')

                <div class="col-md-2">
                </div>

                <div class="col-md-10 sidebar-widget " style="margin-top: 30px">

                    <div class="table-responsive "  >
                        <table class="table">
                            <tbody>

                            <tr id="gradient1" style="color: white">
                                <td class="col-md-1">
                                    <label for=""> @if(session()->get('language') == 'russian') Дата  @else Date  @endif </label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">@if(session()->get('language') == 'russian') Итого @else Total @endif  </label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">@if(session()->get('language') == 'russian') Оплаты @else Payment @endif</label>
                                </td>


                                <td class="col-md-2">
                                    <label for="">@if(session()->get('language') == 'russian')Счет  @else Invoice @endif</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">@if(session()->get('language') == 'russian') Заказы @else Order  @endif </label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">@if(session()->get('language') == 'russian') Действия  @else Action @endif  </label>
                                </td>

                            </tr>


                            @forelse($orders as $order)
                                <tr>
                                    <td class="col-md-1">
                                        <label for=""> {{ $order->order_date }}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> UAH {{ $order->amount }}</label>
                                    </td>


                                    <td class="col-md-3">
                                        <label for=""> {{ $order->payment_method }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> {{ $order->invoice_no }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">
                                            <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>

                                        </label>
                                    </td>

                                    <td class="col-md-1">
                                        <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> @if(session()->get('language') == 'russian') Обзор @else View  @endif </a>

{{--                                        <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>--}}

                                    </td>

                                </tr>
                            @empty
                                <h2 class="text-danger"> @if(session()->get('language') == 'russian') Заказы не найдены  @else Orders Not Found  @endif </h2>

                            @endforelse

                            </tbody>

                        </table>

                    </div>


                </div> <!-- / end col md 8 -->

            </div> <!-- // end row -->

        </div>

    </div>


@endsection
