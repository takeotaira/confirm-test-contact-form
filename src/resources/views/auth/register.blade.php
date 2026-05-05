<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">Contact Form</h1>

            <a href="/login">login</a>
        </div>
    </header>

    <main class="main auth">
        <h1 class="page-title">Register</h1>

        <form class="auth-form" action="/register" method="post">
            @csrf

            <div>
                <label>お名前</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>パスワード</label>
                <input type="password" name="password">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>確認用パスワード</label>
                <input type="password" name="password_confirmation">
            </div>

            <button type="submit">登録</button>
        </form>
    </main>
</body>
</html>