<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="header__inner">
                <h1 class="header__logo">FashionablyLate</h1>
            </div>
        </header>

        <main class="main contact">
            <h2 class="page-title">Contact</h2>

            <form class="form" action="/confirm" method="post">
                @csrf

                <div class="form__group">
                    <label class="form__label">お名前 <span class="form__required">※</span></label>

                    <div class="form__input form__input--name">
                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
                        @error('last_name')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
                        @error('first_name')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form__group">
                    <label class="form__label">性別 <span class="form__required">※</span></label>

                    <div class="form__input form__input--radio">
                        <label>
                            <input type="radio" name="gender" value="1"
                            {{ old('gender') == '1' ? 'checked' : '' }}>
                            男性
                        </label>
                        <label>
                            <input type="radio" name="gender" value="2"
                            {{ old('gender') == '2' ? 'checked' : '' }}>
                            女性
                        </label>
                        <label>
                            <input type="radio" name="gender" value="3"
                            {{ old('gender') == '3' ? 'checked' : '' }}>
                            その他
                        </label>
                        @error('gender')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form__group">
                    <label class="form__label">メールアドレス <span class="form__required">※</span></label>


                    <div class="form__input">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                        @error('email')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form__group">
                    <label class="form__label">
                        電話番号 <span class="form__required">※</span>
                    </label>

                    <div class="form__input">
                        <div class="form__input--tel">
                            <input type="text" name="tel1" value="{{ old('tel1') }}" placeholder="080">
                            <span>-</span>
                            <input type="text" name="tel2" value="{{ old('tel2') }}" placeholder="1234">
                            <span>-</span>
                            <input type="text" name="tel3" value="{{ old('tel3') }}" placeholder="5678">
                        </div>

                        @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                            <p class="form__error">
                                {{ $errors->first('tel1') ?: ($errors->first('tel2') ?: $errors->first('tel3')) }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form__group">
                    <label class="form__label">住所 <span class="form__required">※</span></label>

                    <div class="form__input">
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                        @error('address')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form__group">
                    <label class="form__label">建物名</label>

                    <div class="form__input">
                        <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101">
                    </div>
                </div>

                <div class="form__group">
                    <label class="form__label">お問い合わせの種類 <span class="form__required">※</span></label>

                    <div class="form__input">
                        <select name="category_id">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form__group">
                    <label class="form__label">お問い合わせ内容 <span class="form__required">※</span></label>

                    <div class="form__input">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        @error('detail')
                            <p class="form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="button-area">
                    <button class="button" type="submit">確認画面</button>
                </div>
            </form>
        </main>
    </body>
</html>