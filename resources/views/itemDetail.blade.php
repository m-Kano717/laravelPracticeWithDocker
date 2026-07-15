<!DOCTYPE html>
<html lang="ja">
@include("common.head")
<body>
    @include("common.header")
    @include("common.navi")
    <h3>商品詳細：{{$items->item_name}}</h3>      
    <ul>
        <li>商品ID：{{$items->id}}</li>
        <li>商品名：<a href="{{route('itemDetail', $items->id)}}">{{$items->item_name}}</a></li>
        <li>カテゴリー：{{ $items->categories?->categorie_name }}</li>
        <li>価格：￥{{$items->price}}</li>
        <li>在庫：{{$items->stock}}</li>
    </ul>
    <form action="/addBasket" method="Post">
        @csrf
        <input type="hidden" name="id" value="{{$items->id}}">
        <input type="submit" value="買い物かごに入れる">
    </form>
    </table>