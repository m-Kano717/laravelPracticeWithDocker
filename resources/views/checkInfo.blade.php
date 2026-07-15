<!DOCTYPE html>
<html lang="ja">
@include("common.head")
<body>
    @include("common.header")
    @include("common.navi")

    <h3>入力情報確認</h3>
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

    <form action="/registComplete" method="Post">
        @csrf
        <input type="submit" value="登録">
        <input type="hidden" value="{{$userInfo['first_name']}}" name="first_name">
        <input type="hidden" value="{{$userInfo['last_name']}}" name="last_name">
        <input type="hidden" value="{{$userInfo['pass']}}" name="pass">
        <input type="hidden" value="{{$userInfo['nick_name']}}" name="nick_name">
        <input type="hidden" value="{{$userInfo['address1']}}" name="address1">
        <input type="hidden" value="{{$userInfo['address2']}}" name="address2">
        <input type="hidden" value="{{$userInfo['address3']}}" name="address3">
        <input type="hidden" value="{{$userInfo['address4']}}" name="address4">
        <input type="hidden" value="{{$userInfo['birth_date']}}" name="birth_date">
        <input type="hidden" value="{{$userInfo['sex']}}" name="sex">
        <input type="hidden" value="{{$userInfo['tel']}}" name="tel">
        <input type="hidden" value="{{$userInfo['mail']}}" name="mail">
        <input type="hidden" value="{{$userInfo['user_type']}}" name="user_type">
    </form>
    <br/>
    <form action="/regist" method="Get">
        @csrf
        <input type="submit" value="戻る">
    </form>
</body>