<!DOCTYPE html>
<html lang="ja">

@include("common.head")

<body>
    @include("common.header")
    @include("common.navi")

    @isset($orders)
    <p>▼お客様の注文一覧▼</p>
    <table>
        <tr>
            <th>注文番号</th>
            <th>お届け先住所</th>
            <th>合計金額</th>
            <th>支払方法</th>
            <th>注文日時</th>
        </tr>
        @php
        $i = 0;
        @endphp
        @foreach($orders as $order)
        <tr>
            @php
            $i = $i +1;
            @endphp
            <td>
                <a href="{{url('/orderDetail/'.$i) }}">{{$i}}</a>
            </td>
            <td>{{$order->derivery_address}}</td>
            <td>{{$order->total}}</td>
            <td>{{$order->pay_method}}</td>
            <td>{{$order->created_at}}</td>
        </tr>
        @endforeach
    </table>
    @endisset
    @empty($i)
    <p>ご注文履歴がありません。</p>
    @endempty
</body>