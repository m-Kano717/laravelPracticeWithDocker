<!DOCTYPE html>
<html lang="ja">
@include("common.head")

<body>
    @include("common.header")
    @include("common.navi")

    <h3>新規会員登録</h3>
    @empty($hid)
    <p>メールを送信します。</p>

    <form method="Post" action="/registCheck">
        @csrf
        メールアドレス：<input type="email" name="mail"><br>
        <input type="hidden" name="hid" value="0">
        <input type="submit" value="送信">
    </form>
    @endempty
    @isset($hid)
    <p>番号入力</p>
    <form method="Post" action="/registCheck">
        @csrf
        <input type="number" name="num">
        <input type="hidden" name="hid" value="1">
        <input type="submit" value="送信">
    </form>
    @endisset
    @error("num")
    <p style="color:red;">{{ $message }}</p>
    @enderror
</body>