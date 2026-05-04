<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <header>
        <h1>Contact Form</h1>
    </header>

    <main>
        <h2>Contact</h2>

        <form action="/confirm" method="post">
            @csrf

            <div>
                <label>お名前</label>
                <input type="text" name="last_name" placeholder="例: 山田">
                <input type="text" name="first_name" placeholder="例: 太郎">
            </div>

            <div>
                <label>性別</label>
                <label>
                    <input type="radio" name="gender" value="1" checked>
                    男性
                </label>
                <label>
                    <input type="radio" name="gender" value="2">
                    女性
                </label>
                <label>
                    <input type="radio" name="gender" value="3">
                    その他
                </label>
            </div>

            <div>
                <label>メールアドレス</label>
                <input type="email" name="email" placeholder="例: test@example.com">
            </div>

            <div>
                <label>電話番号</label>
                <input type="text" name="tel" placeholder="例: 08012345678">
            </div>

            <div>
                <label>住所</label>
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
            </div>

            <div>
                <label>建物名</label>
                <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101">
            </div>

            <div>
                <label>お問い合わせの種類</label>
                <select name="category_id">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>お問い合わせ内容</label>
                <textarea name="detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
            </div>

            <button type="submit">確認画面</button>
        </form>
    </main>
</body>
</html>