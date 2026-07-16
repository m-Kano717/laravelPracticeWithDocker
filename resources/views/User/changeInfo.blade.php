<!DOCTYPE html>
<html lang="ja">
@include("common.head")
<body>
    @include("common.header")
    @include("common.navi")
    <h3>会員情報確認</h3>
    @foreach($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
    @endforeach
    <form action="/changeCheck" method="POST">
    @csrf
    名前<input type="text" name="first_name" value='{{ $userInfo["first_name"] ?? "" }}'>
        <input type="text" name="last_name" value='{{ $userInfo["last_name"] ?? "" }}'><br/>
    パスワード：<input type="password" name="pass"> 
    ニックネーム<input type="text" name="nick_name" value='{{ $userInfo["nick_name"] ?? "" }}'><br/>
    
    住所（都道府県）<select name="address1">
        <option value="">選択してください</option>
    
        <option value="北海道" {{ ($userInfo['address1'] ?? '') == '北海道' ? 'selected' : '' }}>北海道</option>
        <option value="青森県" {{ ($userInfo['address1'] ?? '') == '青森県' ? 'selected' : '' }}>青森県</option>
        <option value="岩手県" {{ ($userInfo['address1'] ?? '') == '岩手県' ? 'selected' : '' }}>岩手県</option>
        <option value="宮城県" {{ ($userInfo['address1'] ?? '') == '宮城県' ? 'selected' : '' }}>宮城県</option>
        <option value="秋田県" {{ ($userInfo['address1'] ?? '') == '秋田県' ? 'selected' : '' }}>秋田県</option>
        <option value="山形県" {{ ($userInfo['address1'] ?? '') == '山形県' ? 'selected' : '' }}>山形県</option>
        <option value="福島県" {{ ($userInfo['address1'] ?? '') == '福島県' ? 'selected' : '' }}>福島県</option>

        <option value="茨城県" {{ ($userInfo['address1'] ?? '') == '茨城県' ? 'selected' : '' }}>茨城県</option>
        <option value="栃木県" {{ ($userInfo['address1'] ?? '') == '栃木県' ? 'selected' : '' }}>栃木県</option>
        <option value="群馬県" {{ ($userInfo['address1'] ?? '') == '群馬県' ? 'selected' : '' }}>群馬県</option>
        <option value="埼玉県" {{ ($userInfo['address1'] ?? '') == '埼玉県' ? 'selected' : '' }}>埼玉県</option>
        <option value="千葉県" {{ ($userInfo['address1'] ?? '') == '千葉県' ? 'selected' : '' }}>千葉県</option>
        <option value="東京都" {{ ($userInfo['address1'] ?? '') == '東京都' ? 'selected' : '' }}>東京都</option>
        <option value="神奈川県" {{ ($userInfo['address1'] ?? '') == '神奈川県' ? 'selected' : '' }}>神奈川県</option>

        <option value="新潟県" {{ ($userInfo['address1'] ?? '') == '新潟県' ? 'selected' : '' }}>新潟県</option>
        <option value="富山県" {{ ($userInfo['address1'] ?? '') == '富山県' ? 'selected' : '' }}>富山県</option>
        <option value="石川県" {{ ($userInfo['address1'] ?? '') == '石川県' ? 'selected' : '' }}>石川県</option>
        <option value="福井県" {{ ($userInfo['address1'] ?? '') == '福井県' ? 'selected' : '' }}>福井県</option>
        <option value="山梨県" {{ ($userInfo['address1'] ?? '') == '山梨県' ? 'selected' : '' }}>山梨県</option>
        <option value="長野県" {{ ($userInfo['address1'] ?? '') == '長野県' ? 'selected' : '' }}>長野県</option>
        <option value="岐阜県" {{ ($userInfo['address1'] ?? '') == '岐阜県' ? 'selected' : '' }}>岐阜県</option>
        <option value="静岡県" {{ ($userInfo['address1'] ?? '') == '静岡県' ? 'selected' : '' }}>静岡県</option>
        <option value="愛知県" {{ ($userInfo['address1'] ?? '') == '愛知県' ? 'selected' : '' }}>愛知県</option>

        <option value="三重県" {{ ($userInfo['address1'] ?? '') == '三重県' ? 'selected' : '' }}>三重県</option>
        <option value="滋賀県" {{ ($userInfo['address1'] ?? '') == '滋賀県' ? 'selected' : '' }}>滋賀県</option>
        <option value="京都府" {{ ($userInfo['address1'] ?? '') == '京都府' ? 'selected' : '' }}>京都府</option>
        <option value="大阪府" {{ ($userInfo['address1'] ?? '') == '大阪府' ? 'selected' : '' }}>大阪府</option>
         <option value="兵庫県" {{ ($userInfo['address1'] ?? '') == '兵庫県' ? 'selected' : '' }}>兵庫県</option>
        <option value="奈良県" {{ ($userInfo['address1'] ?? '') == '奈良県' ? 'selected' : '' }}>奈良県</option>
        <option value="和歌山県" {{ ($userInfo['address1'] ?? '') == '和歌山県' ? 'selected' : '' }}>和歌山県</option>

        <option value="鳥取県" {{ ($userInfo['address1'] ?? '') == '鳥取県' ? 'selected' : '' }}>鳥取県</option>
        <option value="島根県" {{ ($userInfo['address1'] ?? '') == '島根県' ? 'selected' : '' }}>島根県</option>
        <option value="岡山県" {{ ($userInfo['address1'] ?? '') == '岡山県' ? 'selected' : '' }}>岡山県</option>
        <option value="広島県" {{ ($userInfo['address1'] ?? '') == '広島県' ? 'selected' : '' }}>広島県</option>
        <option value="山口県" {{ ($userInfo['address1'] ?? '') == '山口県' ? 'selected' : '' }}>山口県</option>
        <option value="徳島県" {{ ($userInfo['address1'] ?? '') == '徳島県' ? 'selected' : '' }}>徳島県</option>
        <option value="香川県" {{ ($userInfo['address1'] ?? '') == '香川県' ? 'selected' : '' }}>香川県</option>
        <option value="愛媛県" {{ ($userInfo['address1'] ?? '') == '愛媛県' ? 'selected' : '' }}>愛媛県</option>
        <option value="高知県" {{ ($userInfo['address1'] ?? '') == '高知県' ? 'selected' : '' }}>高知県</option>

        <option value="福岡県" {{ ($userInfo['address1'] ?? '') == '福岡県' ? 'selected' : '' }}>福岡県</option>
        <option value="佐賀県" {{ ($userInfo['address1'] ?? '') == '佐賀県' ? 'selected' : '' }}>佐賀県</option>
        <option value="長崎県" {{ ($userInfo['address1'] ?? '') == '長崎県' ? 'selected' : '' }}>長崎県</option>
        <option value="熊本県" {{ ($userInfo['address1'] ?? '') == '熊本県' ? 'selected' : '' }}>熊本県</option>
        <option value="大分県" {{ ($userInfo['address1'] ?? '') == '大分県' ? 'selected' : '' }}>大分県</option>
        <option value="宮崎県" {{ ($userInfo['address1'] ?? '') == '宮崎県' ? 'selected' : '' }}>宮崎県</option>
        <option value="鹿児島県" {{ ($userInfo['address1'] ?? '') == '鹿児島県' ? 'selected' : '' }}>鹿児島県</option>
        <option value="沖縄県" {{ ($userInfo['address1'] ?? '') == '沖縄県' ? 'selected' : '' }}>沖縄県</option>
    </select>
    住所（市区町村）<input type="text" name="address2" value='{{ $userInfo["address2"] ?? "" }}'><br/>
    住所１<input type="text" name="address3" value='{{ $userInfo["address3"] ?? "" }}'>
    住所２<input type="text" name="address4" value='{{ $userInfo["address4"] ?? "" }}'><br/>
    生年月日<input type="date" name="birth_date" value='{{ $userInfo["birth_date"] ?? "" }}'><br/>
    
    性別
        <label><input type="radio" name="sex" value="1" {{ ($userInfo['sex'] ?? '') == '1' ? 'checked' : '' }}>男性</label>
        <label><input type="radio" name="sex" value="2" {{ ($userInfo['sex'] ?? '') == '2' ? 'checked' : '' }}>女性</label>
        <label><input type="radio" name="sex" value="3" {{ ($userInfo['sex'] ?? '') == '3' ? 'checked' : '' }}>その他</label><br/>
        
    電話番号<input type="tel" name="tel" value='{{ $userInfo["tel"] ?? "" }}'>
    メールアドレス<input type="mail" name="mail" value="{{ $userInfo["mail"] }}"><br/>
    
    会員タイプ
        <label><input type="radio" name="user_type" value="A" {{ ($userInfo['user_type'] ?? '') == 'A' ? 'checked' : '' }}>A</label>
        <label><input type="radio" name="user_type" value="B" {{ ($userInfo['user_type'] ?? '') == 'B' ? 'checked' : '' }}>B</label>
        <label><input type="radio" name="user_type" value="C" {{ ($userInfo['user_type'] ?? '') == 'C' ? 'checked' : '' }}>C</label><br/>
    <input type="submit" value="登録">
</form>