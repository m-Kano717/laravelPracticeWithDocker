<!DOCTYPE html>
<html lang="ja">

@include("common.head")

<body>
    @include("common.header")
    @include("common.navi")
    <table>
        <tr>
            <th>注文番号</th>
            <th>お届け先住所</th>
        </tr>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->derivery_address}}</td>
        </tr>

        <tr>
            <th>合計金額</th>
            <th>支払方法</th>
            <th>注文日時</th>
        </tr>
        <tr>

            <td>{{$order->total}}</td>
            <td>{{$order->pay_method}}</td>
            <td>{{$order->created_at}}</td>
        </tr>
    </table>
    <br />
    <table>
        <tr>
            <th>商品名</th>
            <th>個数</th>
            <th>単価</th>
            <th>小計</th>
        </tr>
        @foreach($orderItem as $item)
        <tr>
            <td>{{$item->item_id}}</td>
            <td>{{$item->item_num}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->sub_total}}</td>
        </tr>
        @endforeach
    </table>
</body>