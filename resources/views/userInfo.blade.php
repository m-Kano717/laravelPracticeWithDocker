<!DOCTYPE html>
<html lang="ja">
@include("common.head")
<body>
    @include("common.header")
    @include("common.navi")
        <h3>会員情報確認</h3>
    <p>名字：{{$userInfo["first_name"]}}</p>
    <p>名前：{{$userInfo["last_name"]}}</p>
    <p>パスワード：非表示</p>
    <p>ニックネーム：{{$userInfo["nick_name"]}}</p>
    <p>都道府県：{{$userInfo["address1"]}}</p>
    <p>市区町村：{{$userInfo["address2"]}}</p>
    <p>住所１：{{$userInfo["address3"]}}</p>
    <p>住所２：{{$userInfo["address4"]}}</p>
    <p>生年月日：{{$userInfo["birth_date"]}}</p>
    @if($userInfo["sex"] == 1)
    <p>性別：男性</p>
    @elseif($userInfo["sex"] == 2)
    <p>性別：女性</p>
    @else
    <p>性別：その他</p>
    @endif
    <p>電話番号：{{$userInfo["tel"]}}</p>
    <p>メールアドレス：{{$userInfo["mail"]}}</p>
    <p>会員タイプ：{{$userInfo["user_type"]}}</p>

    <button onclick="if(confirm('退会してもよろしいですか？')){window.location.href='/deleteUser'}">退会</button>
    <form action="changeInfo">
        <input type="submit" value="会員情報変更">
    </form>
    