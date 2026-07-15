    <header>
        <h1>PHP練習ショップ</h1>
        @if(session("name"))
            <p><a href='{{url("/userInfo")}}'>{{ session("name") }}</a>さん</p>
            <p>☆あなたの会員タイプは、{{session("type")}}です☆</p>
            <a href="{{url('/logOut')}}">ログアウト</a>
        @else
            <a href="{{url('/')}}">ログイン</a>
            <a href="{{url('/registUser')}}">新規会員登録</a>
        @endif
    </header>