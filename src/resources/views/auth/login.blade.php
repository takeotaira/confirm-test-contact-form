<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Contact Form</h1>

        <a href="/register">register</a>
    </header>
    <h1>Login</h1>

    <form action="/login" method="post">
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
</body>
</html>