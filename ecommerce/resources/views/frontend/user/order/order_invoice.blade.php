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
            <h2 style="color: green; font-size: 26px;"> @if(session()->get('language') == 'russian')  <span style="font-size: 12px"> интернет магазин </span> Диплом  @else <span style="font-size: 12px"> online shop </span>  Diploma  @endif</h2>
        </td>
        <td align="right">
            <pre class="font" >
                @if(session()->get('language') == 'russian')
                    Софиевская-Борщаговка Главный Офис
                @else
                   Sofievskaya - Borshagovka Head Office
                @endif
               Email:makogin@gmail.com <br>
               Mob: 050 382 17 96  <br>
                     @if(session()->get('language') == 'russian')
                        Боголюбова,6
                    @else
                        Bogolubova 6
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
                <strong>  @if(session()->get('language') == 'russian')Имя:  @else Name:  @endif</strong> {{ $order->name }}<br>
                <strong> @if(session()->get('language') == 'russian') Почта :  @else Email: @endif</strong> {{ $order->email }} <br>
                <strong> @if(session()->get('language') == 'russian') Tел: @else Phone: @endif</strong> {{ $order->phone }} <br>
                @php
                    $div = $order->division->division_name;
                    $dis = $order->district->district_name;
                    $state = $order->state->state_name;
                @endphp

                <strong> @if(session()->get('language') == 'russian') Адрес  @else Address: @endif </strong> {{ $div }},{{ $dis }}.{{ $state }} <br>
                <strong>Post Code:</strong> {{ $order->post_code }}
            </p>
        </td>
        <td>

            <p class="font">
            <h3><span style="color: green;">@if(session()->get('language') == 'russian')Cчет  @else Invoice: @endif</span> #{{ $order->invoice_no}}</h3>
            @if(session()->get('language') == 'russian') Дата Заказа : @else Order Date:  @endif {{ $order->order_date }} <br>
            @if(session()->get('language') == 'russian') Дата доставки : @else Delivery Date: @endif  {{ $order->delivered_date }} <br>
            @if(session()->get('language') == 'russian') Метод оплаты : @else Payment Type : @endif {{ $order->payment_method }} </span>
            </p>
        </td>
    </tr>
</table>
<br/>
<h3>@if(session()->get('language') == 'russian') Продукт   @else Products @endif</h3>
<table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">


    <tr class="font">
        <th> @if(session()->get('language') == 'russian') Фото   @else Image @endif </th>
        <th> @if(session()->get('language') == 'russian') Назва продукта  @else Product Name @endif </th>
        <th> @if(session()->get('language') == 'russian') Размер  @else Size @endif</th>
        <th> @if(session()->get('language') == 'russian') Цвет @else Color @endif </th>
        <th> @if(session()->get('language') == 'russian') Код @else Code @endif </th>
        <th> @if(session()->get('language') == 'russian') Колличество @else Quantity @endif</th>
        <th> @if(session()->get('language') == 'russian') Цена за еденицу @else Unit Price @endif </th>
        <th> @if(session()->get('language') == 'russian') Итого @else  Total @endif </th>
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
            <h2><span style="color: green;"> @if(session()->get('language') == 'russian') Итого: @else Subtotal: @endif</span>{{ $order->amount }} UAH</h2>
{{--            <h2><span style="color: green;">Total:</span> ${{ $order->amount }}</h2>--}}
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
</table>
<div class="thanks mt-3">
    <p> @if(session()->get('language') == 'russian') Спасибо за заказ..!! @else Thanks For Buying Products..!! @endif </p>
</div>
<div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5> @if(session()->get('language') == 'russian') Подпись @else Signature: @endif </h5>
</div>
</body>
</html>
