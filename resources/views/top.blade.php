<!DOCTYPE html>
<html lang="ja">
@include("common.head")
<body>
    @include("common.header")
    @include("common.navi")
    
    <h3>本日のおすすめ</h3>
    @foreach($randomItems as $item)
    <ul>
        <li><a href="{{route('itemDetail', $item->id)}}">{{$item->item_name}}</a></li>
        <li>{{$item->categories?->categorie_name}}</li>
        <li>{{$item->price}}</li>
    </ul>
    @endforeach
    
</body>