<!DOCTYPE html>
<html lang="ja">
@include("common.head")
<body>
    <header>
    <h1>PHP練習ショップ</h1>
    </header>
    <contents>
    <p>ログイン</p>
    <div class="form">
    <form action="/formPractice" method="POST">
        @csrf
        @error("mail")
        <p style="color: red;">{{$message}}</p>
        @enderror
        @error("pass")
        <p style="color: red;">{{$message}}</p>
        @enderror
        メールアドレス：<input type="text" name="mail" value="{{ old('mail') }}" >
        <br>
        パスワード：<input type="password" name="pass" value="">
        <br>
        <input type="submit" value="送信">
    </form>
</div>
    </contents>
</body>
</html>