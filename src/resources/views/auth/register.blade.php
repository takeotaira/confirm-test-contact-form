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
                <h1 class="header__logo">FashionablyLate</h1>

                <a class="header__link" href="/login">login</a>
            </div>
        </header>

        <main class="main auth">
            <h1 class="page-title">Register</h1>

            <form class="auth-form" action="/register" method="post">
                @csrf

                <div class="auth-form__group">
                    <label class="auth-form__label">お名前</label>
                    <div class="auth-form__input">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田  太郎">
                        @error('name')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="auth-form__group">
                    <label class="auth-form__label">メールアドレス</label>
                    <div class="auth-form__input">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                        @error('email')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="auth-form__group">
                    <label class="auth-form__label">パスワード</label>
                    <div class="auth-form__input">
                        <input type="password" name="password" placeholder="例: coachtech1106">
                        @error('password')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="auth-form__group">
                    <label class="auth-form__label">確認用パスワード</label>
                    <div class="auth-form__input">
                        <input type="password" name="password_confirmation" placeholder="例: coachtech1106">
                    </div>
                </div>

                <div class="button-area">
                    <button class="button" type="submit">登録</button>
                </div>
            </form>
        </main>
    </body>
</html>