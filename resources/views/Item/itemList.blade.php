<!DOCTYPE html>
<html lang="ja">
@include("common.head")
<body>
    @include("common.header")
    @include("common.navi")
    <table>
        <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th>カテゴリー</th>
            <th>価格</th>
            <th>在庫</th>
        </tr>
        @foreach($itemList as $items)
        <tr>
            <td>{{$items->id}}</td>
            <td><a href="{{route('itemDetail', $items->id)}}">{{$items->item_name}}</a></td>
            <td>{{ $items->categories?->categorie_name }}</td>
            <td>{{$items->price}}</td>
            <td>{{$items->stock}}</td>
        </tr>
        @endforeach
    </table>

</body>