<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">


        * { font-family: DejaVu Sans, sans-serif; }

        table{
            font-size: small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
        .font{
            font-size: 12px;
        }
        .authority {
            /*text-align: center;*/
            float: right
        }
        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }
        .thanks p {
            color: green;;
            font-size: 16px;
            font-weight: normal;
            font-family: DejaVu Sans, sans-serif;
            margin-top: 20px;
        }
    </style>

</head>
<body>

<table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
        <!-- {{-- <img src="" alt="" width="150"/> --}} -->
            <h2 style="color: green; font-size: 26px;"> @if(session()->get('language') == 'russian')  <span style="font-size: 12px"> интернет магазин </span> Диплом  @else <span style="font-size: 12px"> интернет магазин </span>  Диплом  @endif</h2>
        </td>
        <td align="right">
            <pre class="font" >
                @if(session()->get('language') == 'russian')
                    Софиевская-Борщаговка Главный Офис
                @else
                    Софиевская-Борщаговка Главный Офис
                @endif
               Email:makogin@gmail.com <br>
               Mob: 050 382 17 96  <br>
                     @if(session()->get('language') == 'russian')
                    Боголюбова,6
                @else
                        Боголюбова,6
                @endif
                <br>

            </pre>
        </td>
    </tr>

</table>


<table width="100%" style="background:white; padding:2px;""></table>
<table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
            <p class="font" style="margin-left: 20px;">
                <strong>  @if(session()->get('language') == 'russian')Имя:  @else Имя:  @endif</strong> {{ $order->name }}<br>
                <strong> @if(session()->get('language') == 'russian') Почта :  @else Почта : @endif</strong> {{ $order->email }} <br>
                <strong> @if(session()->get('language') == 'russian') Tел: @else Tел: @endif</strong> {{ $order->phone }} <br>
                @php
                    $div = $order->division->division_name;
                    $dis = $order->district->district_name;
                    $state = $order->state->state_name;
                @endphp

                <strong> @if(session()->get('language') == 'russian') Адрес : @else Адрес : @endif </strong> {{ $div }},{{ $dis }}.{{ $state }} <br>
                <strong>Post Code:</strong> {{ $order->post_code }}
            </p>
        </td>
        <td>

            <p class="font">
            <h3><span style="color: green;">@if(session()->get('language') == 'russian')Cчет  @else Invoice: @endif</span> #{{ $order->invoice_no}}</h3>
            @if(session()->get('language') == 'russian') Дата Заказа : @else Дата Заказа :  @endif {{ $order->order_date }} <br>
            @if(session()->get('language') == 'russian') Дата доставки : @else Дата доставки : @endif  {{ $order->delivered_date }} <br>
            @if(session()->get('language') == 'russian') Метод оплаты : @else Метод оплаты : @endif {{ $order->payment_method }} </span>
            </p>
        </td>
    </tr>
</table>
<br/>
<h3>@if(session()->get('language') == 'russian') Продукт   @else Продукт  @endif</h3>
<table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">


    <tr class="font">
        <th> @if(session()->get('language') == 'russian') Фото   @else Фото @endif </th>
        <th> @if(session()->get('language') == 'russian') Назва продукта  @else Назва продукта @endif </th>
        <th> @if(session()->get('language') == 'russian') Размер  @else Размер @endif</th>
        <th> @if(session()->get('language') == 'russian') Цвет @else Цвет @endif </th>
        <th> @if(session()->get('language') == 'russian') Код @else Код @endif </th>
        <th> @if(session()->get('language') == 'russian') Колличество @else Колличество @endif</th>
        <th> @if(session()->get('language') == 'russian') Цена за еденицу @else Цена за еденицу @endif </th>
        <th> @if(session()->get('language') == 'russian') Итого @else  Итого @endif </th>
    </tr>
    </thead>
    <tbody>
    @foreach($orderItem as $item)
        <tr class="font">
            <td align="center">
                <img src="{{ public_path($item->product->product_thambnail)  }}" height="60px;" width="60px;" alt="">
            </td>
            <td align="center"> {{ $item->product->product_name_en }}</td>
            <td align="center">
                @if($item->size == NULL)
                    ----
                @else
                    {{ $item->size }}
                @endif
            </td>
            <td align="center">{{ $item->color }}</td>
            <td align="center">{{ $item->product->product_code }}</td>
            <td align="center">{{ $item->qty }}</td>
            <td align="center">${{ $item->price }}</td>
            <td align="center">${{ $item->price * $item->qty }} </td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
<table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;"> @if(session()->get('language') == 'russian') Итого: @else Итого: @endif</span>{{ $order->amount }} UAH</h2>
            {{--            <h2><span style="color: green;">Total:</span> ${{ $order->amount }}</h2>--}}
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
</table>
<div class="thanks mt-3">
    <p> @if(session()->get('language') == 'russian') Спасибо за заказ..!! @else Спасибо за заказ..!! @endif </p>
</div>
<div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5> @if(session()->get('language') == 'russian') Подпись @else Подпись :  @endif </h5>
</div>
</body>
</html>
