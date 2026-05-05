<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <header>
        <h1>Contact Form</h1>

        <a href="/login">login</a>
    </header>
    <h1>Register</h1>

    <form action="/register" method="post">
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
</body>
</html>