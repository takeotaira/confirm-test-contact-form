<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirm</title>
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="header__inner">
                <h1 class="header__logo">FashionablyLate</h1>
            </div>
        </header>

        <main class="main confirm">
            <h2 class="page-title">Confirm</h2>

            <form class="confirm-form" action="/contacts" method="post">
                @csrf

                @php
                    $genderText = [
                        '1' => '男性',
                        '2' => '女性',
                        '3' => 'その他',
                    ][$contact['gender']] ?? '';
                @endphp

                <table class="confirm-table">
                    <tr>
                        <th>お名前</th>
                        <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ $genderText }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $contact['email'] }}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>{{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}</td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>{{ $contact['address'] }}</td>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td>{{ $contact['building'] }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせの種類</th>
                        <td>{{ $category->content }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容</th>
                        <td>{{ $contact['detail'] }}</td>
                    </tr>
                </table>

                @foreach ($contact as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach

                <div class="button-area">
                    <button class="button" type="submit" name="action" value="submit">送信</button>
                    <button class="button button--back" type="submit" name="action" value="back">修正</button>
                </div>
            </form>
        </main>
    </body>
</html>