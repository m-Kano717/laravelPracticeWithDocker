<!DOCTYPE html>
<html lang="ja">

@include("common.head")
<style>
    /* 💡 初期状態：チェックボックスの直後にある「.target-box」を非表示にする */
    .toggleTrigger:not(:checked)~.userAddress {
        display: none;
    }

    .toggleTrigger:checked~.otherAddress {
        display: none;
    }
</style>

<body>
    @include("common.header")
    @include("common.navi")
    <h3>注文情報入力</h3>
    @if(($steps ?? 0) == 0 )

    <p>住所入力</p> <input type="checkbox" class="toggleTrigger" checked>登録された住所を使用する
    <p></p>
    <form method="Post" action="/orderRegist" class="userAddress">
        @csrf
        名前<input type="text" name="first_name" value='{{ $userInfo["first_name"] ?? "" }}'>
        <input type="text" name="last_name" value='{{ $userInfo["last_name"] ?? "" }}'><br />

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
        住所（市区町村）<input type="text" name="address2" value='{{ $userInfo["address2"] ?? "" }}'><br />
        住所１<input type="text" name="address3" value='{{ $userInfo["address3"] ?? "" }}'>
        住所２<input type="text" name="address4" value='{{ $userInfo["address4"] ?? "" }}'><br />

        <input type="hidden" value="1" name="steps">
        <input type="submit" value="次へ">
    </form>


    <form method="Post" action="/orderRegist" class="otherAddress">
        @csrf
        名前<input type="text" name="first_name" value='{{old("first_name")}}'>
        <input type="text" name="last_name" value='{{old("last_name")}}'><br />
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
        <input type="hidden" value="1" name="steps">
        <input type="submit" value="次へ">
    </form>

    @elseif($steps == 1)

    <form method="Post" action="/orderRegist">
        @csrf
        <input type="hidden" name="first_name" value='{{ $userInfo["first_name"] ?? "" }}'>
        <input type="hidden" name="last_name" value='{{ $userInfo["last_name"] ?? "" }}'>
        <input type="hidden" name="address1" value='{{ $userInfo["address1"] ?? "" }}'>
        <input type="hidden" name="address2" value='{{ $userInfo["address2"] ?? "" }}'>
        <input type="hidden" name="address3" value='{{ $userInfo["address3"] ?? "" }}'>
        <input type="hidden" name="address4" value='{{ $userInfo["address4"] ?? "" }}'>

        <label>
            <input type="radio" name="pay_method" value="クレジットカード"
                {{ old('pay_method', $userInfo->pay_method ?? 'クレジットカード') == 'クレジットカード' ? 'checked' : '' }}>クレジットカード
        </label><br />

        <label>
            <input type="radio" name="pay_method" value="銀行振込"
                {{ old('pay_method', $userInfo->pay_method ?? '') == '銀行振込' ? 'checked' : '' }}>銀行振込
        </label><br />

        <label>
            <input type="radio" name="pay_method" value="代引き"
                {{ old('pay_method', $userInfo->pay_method ?? '') == '代引き' ? 'checked' : '' }}>代引き
        </label><br />

        <label>
            <input type="radio" name="pay_method" value="PayPay"
                {{ old('pay_method', $userInfo->pay_method ?? '') == 'PayPay' ? 'checked' : '' }}>PayPay
        </label><br />

        <label>
            <input type="radio" name="pay_method" value="コンビニ支払い"
                {{ old('pay_method', $userInfo->pay_method ?? '') == 'コンビニ支払い' ? 'checked' : '' }}>コンビニ支払い</label><br />

        <label>
            <input type="radio" name="pay_method" value="PayPal"
                {{ old('pay_method', $userInfo->pay_method ?? '') == 'PayPal' ? 'checked' : '' }}>PayPal
        </label><br />

        <input type="hidden" value="2" name="steps">
        <input type="submit" value="次へ">
    </form>
    <form method="Post" action="/orderRegist">
        @csrf
        <input type="hidden" name="first_name" value='{{ $userInfo["first_name"] ?? "" }}'>
        <input type="hidden" name="last_name" value='{{ $userInfo["last_name"] ?? "" }}'>
        <input type="hidden" name="address1" value='{{ $userInfo["address1"] ?? "" }}'>
        <input type="hidden" name="address2" value='{{ $userInfo["address2"] ?? "" }}'>
        <input type="hidden" name="address3" value='{{ $userInfo["address3"] ?? "" }}'>
        <input type="hidden" name="address4" value='{{ $userInfo["address4"] ?? "" }}'>

        <input type="hidden" value="0" name="steps">
        <input type="submit" value="戻る">
    </form>

    @elseif($steps == 2)
    <table>
        <tr>
            <th>氏名</th>
            <th>住所</th>
            <th>支払方法</th>
        </tr>
        <tr>
            <td>{{$userInfo->first_name}} {{$userInfo->last_name}}</td>
            <td>{{$userInfo->address1}} {{$userInfo->address2}} {{$userInfo->address3}} {{$userInfo->address4}}</td>
            <td>{{$userInfo->pay_method}}</td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <th>商品名</th>
            <th>単価</th>
            <th>個数</th>
            <th>小計</th>
        </tr>
        @foreach(session("basketItems") as $item)
        <tr>
            <td>{{$item->item_name}}</td>
            <td>{{$item->price}}円</td>
            <td>{{$item->order}}</td>
            <td>{{$item->total_price}}円</td>
        </tr>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>合計</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>{{$userInfo->total_price}}</th>
        </tr>
    </table>
    <form method="Post" action="/orderComplete">
        @csrf
        <input type="hidden" name="first_name" value='{{ $userInfo["first_name"] ?? "" }}'>
        <input type="hidden" name="last_name" value='{{ $userInfo["last_name"] ?? "" }}'>
        <input type="hidden" name="address1" value='{{ $userInfo["address1"] ?? "" }}'>
        <input type="hidden" name="address2" value='{{ $userInfo["address2"] ?? "" }}'>
        <input type="hidden" name="address3" value='{{ $userInfo["address3"] ?? "" }}'>
        <input type="hidden" name="address4" value='{{ $userInfo["address4"] ?? "" }}'>
        <input type="hidden" name="pay_method" value="{{$userInfo["pay_method"] ?? ""}}">
        <input type="hidden" name="total_price" value="{{ $userInfo["total_price"] }}">
        <input type="submit" value="注文する">
    </form>
    <form method="Post" action="/orderRegist">
        @csrf
        <input type="hidden" name="first_name" value='{{ $userInfo["first_name"] ?? "" }}'>
        <input type="hidden" name="last_name" value='{{ $userInfo["last_name"] ?? "" }}'>
        <input type="hidden" name="address1" value='{{ $userInfo["address1"] ?? "" }}'>
        <input type="hidden" name="address2" value='{{ $userInfo["address2"] ?? "" }}'>
        <input type="hidden" name="address3" value='{{ $userInfo["address3"] ?? "" }}'>
        <input type="hidden" name="address4" value='{{ $userInfo["address4"] ?? "" }}'>
        <input type="hidden" name="pay_method" value="{{$userInfo["pay_method"] ?? ""}}">
        <input type="hidden" value="1" name="steps">
        <input type="submit" value="戻る">
    </form>

    @endif
</body>