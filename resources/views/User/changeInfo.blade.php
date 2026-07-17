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

    名前
    <input type="text" name="first_name" value="{{ old('first_name', $userInfo['first_name'] ?? '') }}">
    <input type="text" name="last_name" value="{{ old('last_name', $userInfo['last_name'] ?? '') }}"><br/>

    パスワード：
    <input type="password" name="pass"><br/>

    ニックネーム
    <input type="text" name="nick_name" value="{{ old('nick_name', $userInfo['nick_name'] ?? '') }}"><br/>
    
    住所（都道府県）
    <select name="address1">
        <option value="">選択してください</option>
        @foreach(['北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'] as $pref)
            <option value="{{ $pref }}" {{ old('address1', $userInfo['address1'] ?? '') == $pref ? 'selected' : '' }}>{{ $pref }}</option>
        @endforeach
    </select>
    <br/>

    住所（市区町村）
    <input type="text" name="address2" value="{{ old('address2', $userInfo['address2'] ?? '') }}"><br/>

    住所１
    <input type="text" name="address3" value="{{ old('address3', $userInfo['address3'] ?? '') }}">
    住所２
    <input type="text" name="address4" value="{{ old('address4', $userInfo['address4'] ?? '') }}"><br/>

    生年月日
    <input type="date" name="birth_date" value="{{ old('birth_date', $userInfo['birth_date'] ?? '') }}"><br/>
    
    性別
    <label><input type="radio" name="sex" value="1" {{ old('sex', $userInfo['sex'] ?? '') == '1' ? 'checked' : '' }}>男性</label>
    <label><input type="radio" name="sex" value="2" {{ old('sex', $userInfo['sex'] ?? '') == '2' ? 'checked' : '' }}>女性</label>
    <label><input type="radio" name="sex" value="3" {{ old('sex', $userInfo['sex'] ?? '') == '3' ? 'checked' : '' }}>その他</label><br/>
        
    電話番号
    <input type="tel" name="tel" value="{{ old('tel', $userInfo['tel'] ?? '') }}">
    メールアドレス
    <input type="mail" name="mail" value="{{ old('mail', $userInfo['mail'] ?? '') }}"><br/>
    
    会員タイプ
    <label><input type="radio" name="user_type" value="A" {{ old('user_type', $userInfo['user_type'] ?? '') == 'A' ? 'checked' : '' }}>A</label>
    <label><input type="radio" name="user_type" value="B" {{ old('user_type', $userInfo['user_type'] ?? '') == 'B' ? 'checked' : '' }}>B</label>
    <label><input type="radio" name="user_type" value="C" {{ old('user_type', $userInfo['user_type'] ?? '') == 'C' ? 'checked' : '' }}>C</label><br/>

    <input type="submit" value="登録">
</form>
</form>