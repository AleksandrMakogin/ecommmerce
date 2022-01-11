@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')

                <div class="col-md-5 sidebar-widget" style="margin: 22px">
                    <div class="card">
                        <div class="card-header"><h4 >@if(session('language') == 'russian')  Реквизиты для отгрузки  @else Shipping Details @endif </h4></div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th>    <span class="badge badge-pill badge-warning"  >@if(session('language') == 'russian') Имя отправителя :  @else Shipping Name : @endif </span> </th>
                                    <th> {{ $order->name }} </th>
                                </tr>

                                <tr>
                                    <th> <span class="badge badge-pill badge-warning"  >@if(session('language') == 'russian') Тел отправителя :  @else Shipping Phone : @endif </span> </th>
                                    <th> {{ $order->phone }} </th>
                                </tr>

                                <tr>
                                    <th> <span class="badge badge-pill badge-warning"  >@if(session('language') == 'russian') Email отправителя :  @else Shipping Email :@endif </span> </th>
                                    <th> {{ $order->email }} </th>
                                </tr>

                                <tr>
                                    <th><span class="badge badge-pill badge-warning"  >@if(session('language') == 'russian') Область :  @else Division :@endif </span> </th>
                                    <th> {{ $order->division->division_name }} </th>
                                </tr>

                                <tr>
                                    <th> <span class="badge badge-pill badge-warning" >@if(session('language') == 'russian')Район :  @else District :@endif </span> </th>
                                    <th> {{ $order->district->district_name }} </th>
                                </tr>

                                <tr>
                                    <th> <span class="badge badge-pill badge-warning" >@if(session('language') == 'russian') Населенный пункт @else State : @endif </span></th>
                                    <th>{{ $order->state->state_name }} </th>
                                </tr>

                                <tr>
                                    <th> <span class="badge badge-pill badge-warning" >@if(session('language') == 'russian') Почтовий код :  @else Post Code : @endif</th>
                                    <th> {{ $order->post_code }} </th>
                                </tr>

                                <tr>
                                    <th> <span class="badge badge-pill badge-warning" > @if(session('language') == 'russian') Дата заказа :  @else Order Date : @endif </th>
                                    <th> {{ $order->order_date }} </th>
                                </tr>

                            </table>


                        </div>

                    </div>

                </div> <!-- // end col md -5 -->

                <div class="col-md-4 sidebar-widget" style="margin: 22px" >
                    <div class="card">
                        <div class="card-header"><h4> @if(session()->get('language') == 'russian') Информация для заказа @else Order Details @endif
                                <span class="text-danger">  @if(session()->get('language') == 'russian') счет  @else  Invoice :  @endif {{ $order->invoice_no }}</span></h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> @if(session()->get('language') == 'russian')Имя :  @else  Name : @endif </th>
                                    <th> {{ $order->user->name }} </th>
                                </tr>

                                <tr>
                                    <th>  @if(session()->get('language') == 'russian') Tелефон :  @else  Phone : @endif   </th>
                                    <th> {{ $order->user->phone }} </th>
                                </tr>

                                <tr>
                                    <th> @if(session()->get('language') == 'russian') Метод оплаты  @else Payment Type : @endif </th>
                                    <th> {{ $order->payment_method }} </th>
                                </tr>

                                <tr>
                                    <th> @if(session()->get('language') == 'russian') ID транзакции  @else  Tranx ID :  @endif </th>
                                    <th> {{ mb_strimwidth($order->transaction_id, 0,10 ) }} </th>
                                </tr>

                                <tr>
                                    <th> @if(session()->get('language') == 'russian') Счет :  @else Invoice :  @endif </th>
                                    <th class="text-danger"> {{ $order->invoice_no }} </th>
                                </tr>

                                <tr>
                                    <th> @if(session()->get('language') == 'russian') Итого : @else Order Total : @endif  </th>
                                    <th>{{ $order->amount }} </th>
                                </tr>

                                <tr>
                                    <th>  @if(session()->get('language') == 'russian') Статус :   @else Status : @endif </th>
                                    <th>
                                        <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
                                </tr>
                            </table>


                        </div>

                    </div>

                </div> <!-- // 2ND end col md -5 -->


                <div class="row ">



                    <div class="col-md-10 pull-right sidebar-widget" >

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                <tr style="background: #e2e2e2;">
                                    <td class="col-md-1">
                                        <label for="">@if(session()->get('language') == 'russian') Фото  @else  Image @endif </label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> @if(session()->get('language') == 'russian') Назва продукта @else Product Name @endif </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> @if(session()->get('language') == 'russian') Код продукта @else Product Code @endif</label>
                                    </td>


                                    <td class="col-md-1">
                                        <label for=""> @if(session()->get('language') == 'russian') Цвет @else Color @endif </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for="">  @if(session()->get('language') == 'russian') Размер  @else  Size  @endif </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> @if(session()->get('language') == 'russian') Ко-во  @else Quantity @endif </label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">  @if(session()->get('language') == 'russian')  Цена @else Price @endif  </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for=""> @if(session()->get('language') == 'russian')  @else  Download  @endif  </label>
                                    </td>

                                </tr>


                                @foreach($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->product->product_name_en }}</label>
                                        </td>


                                        <td class="col-md-1">
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for=""> {{ $item->size }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td class="col-md-3">
                                            <label for=""> {{ $item->price }} UAH  <br>( $ {{ $item->price * $item->qty}} ) UAH </label>
                                        </td>
                                        @php
                                            $file = App\Models\Proudct::where('id',$item->product_id)->first();
                                        @endphp

                                        <td class="col-md-1">
                                            @if($order->status == 'pending')
                                                <strong>
                                                    <span class="badge badge-pill badge-success" style="background: #418DB9;"> No File</span>  </strong>

                                            @elseif($order->status == 'confirm')

                                                <a target="_blank" href="{{ asset('upload/pdf/'.$file->digital_file) }}">
                                                    <strong>
                                                        <span class="badge badge-pill badge-success" style="background: #FF0000;"> @if(session()->get('language') == 'russian') Загрузить файл @else Download Ready @endif </span>  </strong> </a>
                                            @endif


                                        </td>

                                    </tr>
                                @endforeach





                                </tbody>

                            </table>

                        </div>





                    </div> <!-- / end col md 8 -->



            </div> <!-- // END ORDER ITEM ROW -->

            @if($order->status !== "delivered")

            @else

                    @php
                        $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                    @endphp
                    @if($order)
                    <form action="{{ route('return.order',$order->id) }}" method="post">
                        @csrf
                <div class="form-group">
                    <label for="label"> @if(session()->get('language') == 'russian')  Причина возврата заказа:   @else Reason: Order Return Reason: @endif </label>
                    <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">@if(session()->get('language') == 'russian') Укажите причину @else Return Reason @endif  </textarea>

                </div>
                        <div class="mb-4" >
                            <button style="margin-bottom: 10px" type="submit" class="btn btn-danger  ">@if(session()->get('language') == 'russian') Вернуть заказ  @else Order Return @endif </button>
                        </div>

                    </form>
                    @else

                        <span class="badge badge-pill badge-warning" style="background: red">Вы должны указать причину возврата </span>

                    @endif


                @endif










                </div> <!-- // END ORDER ITEM ROW -->







            </div> <!-- // end row -->

        </div>

    </div>


@endsection
