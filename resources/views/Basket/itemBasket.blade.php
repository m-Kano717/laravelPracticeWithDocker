<!DOCTYPE html>
<html lang="ja">
@include("common.head")
<style>/*Geminiに書かせた
    /* 1. テーブルの「削除」「追加」ボタンが入るセル（td）を小さく保つ */
    table td {
        width: auto;
        white-space: nowrap; /* ボタンや文字が途中で改行されるのを防ぐ */
        padding: 8px;        /* セル内の余白を適度に縮める */
    }

    /* 2. セルの中にある form 自体が横に広がるのを完全に防ぐ 💡ここが一番重要です */
    table td form {
        display: inline !important; /* ブロック化して横に広がるのをリセット */
        margin: 0 !important;
        padding: 0 !important;
        border: none !important;    /* 万が一mvp.cssがformに枠線をつけている場合の対策 */
        background: none !important; /* 背景色も透明にする */
        box-shadow: none !important;
    }

    /* 3. 送信ボタン（input[type="submit"]）自体のサイズを整える */
    table td input[type="submit"] {
        display: inline-block !important;
        width: auto !important;     /* 横幅を文字（「削除」や「追加」）の幅に合わせる */
        height: auto !important;    /* 縦幅が固定されて引き伸ばされるのを防ぐ */
        padding: 6px 12px !important; /* ボタンらしい程よい余白に調整 */
        margin: 0 !important;
        font-size: 0.9rem !important;
        min-width: 60px !important; /* 削除・追加ボタンの横幅をきれいに揃える */
    }
</style>

<body>
    @include("common.header")
    @include("common.navi")
    @error("order" )
    <p style="color:red;">{{ $message }}</p>
    @enderror
    @isset($items)
    <table>
        <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th> </th>
            <th></th>
            <th>数量</th>
            <th>在庫</th>
            <th>価格</th>
            <th>小計</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="{{route('itemDetail', $item->id)}}">{{$item->item_name}}</a></td>
            <td>
                <form method="Post" action="itemDelete">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="submit" value="削除">
                </form>
            </td>
            <td>
                <form method="Post" action="addBasket">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="submit" value="追加">
                </form>
            </td>
            <td>{{$item->order}}</td>
            <td>{{$item->stock}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->total_price}}</td>
        </tr>
        <!-- <p>{{$item->id}}</p>
    <p>{{$item->item_name}}</p> -->
        @endforeach
    </table><br/>
    <button onclick="location.href='{{url('/basketAllDelete')}}'">買い物かごを空にする</button>
    <form action="orderRegist" method="Post">
        @csrf
        <input type="submit" value="注文へ進む">
    </form>
    @endisset
    @empty($items)
    <p>買い物かごは空です。</p>
    @endempty