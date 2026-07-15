<!DOCTYPE html>
<html lang="ja">
@include("common.head")

<body>
    @include("common.header")
    @include("common.navi")

    <h3>会員情報入力</h3>
    @foreach($errors->all() as $error)
    <p style="color:red;">{{ $error }}</p>
    @endforeach
    <form action="/checkInfo" method="POST">
        @csrf
        名前<input type="text" name="first_name" value='{{old("first_name")}}'>
        <input type="text" name="last_name" value='{{old("last_name")}}'><br />
        パスワード：<input type="password" name="pass">
        ニックネーム<input type="text" name="nick_name" value='{{old("nick_name")}}'><br />
        住所（都道府県）<select name="address1">
            <option value="">選択してください</option>

            <option value="北海道" {{ old('address1') == '北海道' ? 'selected' : '' }}>北海道</option>
            <option value="青森県" {{ old('address1') == '青森県' ? 'selected' : '' }}>青森県</option>
            <option value="岩手県" {{ old('address1') == '岩手県' ? 'selected' : '' }}>岩手県</option>
            <option value="宮城県" {{ old('address1') == '宮城県' ? 'selected' : '' }}>宮城県</option>
            <option value="秋田県" {{ old('address1') == '秋田県' ? 'selected' : '' }}>秋田県</option>
            <option value="山形県" {{ old('address1') == '山形県' ? 'selected' : '' }}>山形県</option>
            <option value="福島県" {{ old('address1') == '福島県' ? 'selected' : '' }}>福島県</option>

            <option value="茨城県" {{ old('address1') == '茨城県' ? 'selected' : '' }}>茨城県</option>
            <option value="栃木県" {{ old('address1') == '栃木県' ? 'selected' : '' }}>栃木県</option>
            <option value="群馬県" {{ old('address1') == '群馬県' ? 'selected' : '' }}>群馬県</option>
            <option value="埼玉県" {{ old('address1') == '埼玉県' ? 'selected' : '' }}>埼玉県</option>
            <option value="千葉県" {{ old('address1') == '千葉県' ? 'selected' : '' }}>千葉県</option>
            <option value="東京都" {{ old('address1') == '東京都' ? 'selected' : '' }}>東京都</option>
            <option value="神奈川県" {{ old('address1') == '神奈川県' ? 'selected' : '' }}>神奈川県</option>

            <option value="新潟県" {{ old('address1') == '新潟県' ? 'selected' : '' }}>新潟県</option>
            <option value="富山県" {{ old('address1') == '富山県' ? 'selected' : '' }}>富山県</option>
            <option value="石川県" {{ old('address1') == '石川県' ? 'selected' : '' }}>石川県</option>
            <option value="福井県" {{ old('address1') == '福井県' ? 'selected' : '' }}>福井県</option>
            <option value="山梨県" {{ old('address1') == '山梨県' ? 'selected' : '' }}>山梨県</option>
            <option value="長野県" {{ old('address1') == '長野県' ? 'selected' : '' }}>長野県</option>
            <option value="岐阜県" {{ old('address1') == '岐阜県' ? 'selected' : '' }}>岐阜県</option>
            <option value="静岡県" {{ old('address1') == '静岡県' ? 'selected' : '' }}>静岡県</option>
            <option value="愛知県" {{ old('address1') == '愛知県' ? 'selected' : '' }}>愛知県</option>

            <option value="三重県" {{ old('address1') == '三重県' ? 'selected' : '' }}>三重県</option>
            <option value="滋賀県" {{ old('address1') == '滋賀県' ? 'selected' : '' }}>滋賀県</option>
            <option value="京都府" {{ old('address1') == '京都府' ? 'selected' : '' }}>京都府</option>
            <option value="大阪府" {{ old('address1') == '大阪府' ? 'selected' : '' }}>大阪府</option>
            <option value="兵庫県" {{ old('address1') == '兵庫県' ? 'selected' : '' }}>兵庫県</option>
            <option value="奈良県" {{ old('address1') == '奈良県' ? 'selected' : '' }}>奈良県</option>
            <option value="和歌山県" {{ old('address1') == '和歌山県' ? 'selected' : '' }}>和歌山県</option>

            <option value="鳥取県" {{ old('address1') == '鳥取県' ? 'selected' : '' }}>鳥取県</option>
            <option value="島根県" {{ old('address1') == '島根県' ? 'selected' : '' }}>島根県</option>
            <option value="岡山県" {{ old('address1') == '岡山県' ? 'selected' : '' }}>岡山県</option>
            <option value="広島県" {{ old('address1') == '広島県' ? 'selected' : '' }}>広島県</option>
            <option value="山口県" {{ old('address1') == '山口県' ? 'selected' : '' }}>山口県</option>
            <option value="徳島県" {{ old('address1') == '徳島県' ? 'selected' : '' }}>徳島県</option>
            <option value="香川県" {{ old('address1') == '香川県' ? 'selected' : '' }}>香川県</option>
            <option value="愛媛県" {{ old('address1') == '愛媛県' ? 'selected' : '' }}>愛媛県</option>
            <option value="高知県" {{ old('address1') == '高知県' ? 'selected' : '' }}>高知県</option>

            <option value="福岡県" {{ old('address1') == '福岡県' ? 'selected' : '' }}>福岡県</option>
            <option value="佐賀県" {{ old('address1') == '佐賀県' ? 'selected' : '' }}>佐賀県</option>
            <option value="長崎県" {{ old('address1') == '長崎県' ? 'selected' : '' }}>長崎県</option>
            <option value="熊本県" {{ old('address1') == '熊本県' ? 'selected' : '' }}>熊本県</option>
            <option value="大分県" {{ old('address1') == '大分県' ? 'selected' : '' }}>大分県</option>
            <option value="宮崎県" {{ old('address1') == '宮崎県' ? 'selected' : '' }}>宮崎県</option>
            <option value="鹿児島県" {{ old('address1') == '鹿児島県' ? 'selected' : '' }}>鹿児島県</option>
            <option value="沖縄県" {{ old('address1') == '沖縄県' ? 'selected' : '' }}>沖縄県</option>
        </select>
        住所（市区町村）<input type="text" name="address2" value='{{old("address2")}}'><br />
        住所１<input type="text" name="address3" value='{{old("address3")}}'>
        住所２<input type="text" name="address4" value='{{old("address4")}}'><br />
        生年月日<input type="date" name="birth_date" value='{{old("birth_date")}}'><br />
        性別
        <label><input type="radio" name="sex" value="1" {{ old('sex', $userInfo['sex'] ?? '1') == '1' ? 'checked' : '' }}>男性</label>
        <label><input type="radio" name="sex" value="2" {{ old('sex', $userInfo['sex'] ?? '1') == '2' ? 'where' : '' }} {{ old('sex', $userInfo['sex'] ?? '1') == '2' ? 'checked' : '' }}>女性</label>
        <label><input type="radio" name="sex" value="3" {{ old('sex', $userInfo['sex'] ?? '1') == '3' ? 'checked' : '' }}>その他</label><br />
        電話番号<input type="tel" name="tel" value='{{ old("tel") }}'>
        メールアドレス<input type="mail" name="mail" value="{{session('mail')}}" disabled><br />
        会員タイプ
        <label><input type="radio" name="user_type" value="A" {{ old('user_type', $userInfo['user_type'] ?? 'A') == 'A' ? 'checked' : '' }}>A</label>
<label><input type="radio" name="user_type" value="B" {{ old('user_type', $userInfo['user_type'] ?? 'A') == 'B' ? 'checked' : '' }}>B</label>
<label><input type="radio" name="user_type" value="C" {{ old('user_type', $userInfo['user_type'] ?? 'A') == 'C' ? 'checked' : '' }}>C</label><br />
        <input type="submit" value="登録">
    </form>
</body>