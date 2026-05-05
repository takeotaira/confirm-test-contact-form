<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">Contact Form</h1>

            <a href="/register">register</a>
        </div>
    </header>

    <main class="main auth">
        <h1 class="page-title">Login</h1>

        <form class="auth-form" action="/login" method="post">
            @csrf

            <div>
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="form__error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>パスワード</label>
                <input type="password" name="password">
                @error('password')
                    <p class="form__error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">ログイン</button>
        </form>
    </main>
</body>
</html>