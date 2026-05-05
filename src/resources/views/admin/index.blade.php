<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <header>
        <h1>Contact Form</h1>
    </header>

    <main>
        <h2>Admin</h2>
        <form action="/search" method="get">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">

            <select name="gender">
                <option value="">性別</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>

            <select name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="date" value="{{ request('date') }}">

            <button type="submit">検索</button>
        </form>

        <form action="/reset" method="get">
            <button type="submit">リセット</button>
        </form>

        <table border="1">
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
                <th>削除</th>
            </tr>

            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>
                        @if ($contact->gender == 1)
                            男性
                        @elseif ($contact->gender == 2)
                            女性
                        @else
                            その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td>
                        <button type="button" onclick="document.getElementById('modal-{{ $contact->id }}').showModal()">
                            詳細
                        </button>

                        <dialog id="modal-{{ $contact->id }}">
                            <table border="1">
                                <tr>
                                    <th>お名前</th>
                                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>性別</th>
                                    <td>
                                        @if ($contact->gender == 1)
                                            男性
                                        @elseif ($contact->gender == 2)
                                            女性
                                        @else
                                            その他
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>メールアドレス</th>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>{{ $contact->tel }}</td>
                                </tr>
                                <tr>
                                    <th>住所</th>
                                    <td>{{ $contact->address }}</td>
                                </tr>
                                <tr>
                                    <th>建物名</th>
                                    <td>{{ $contact->building }}</td>
                                </tr>
                                <tr>
                                    <th>お問い合わせの種類</th>
                                    <td>{{ $contact->category->content }}</td>
                                </tr>
                                <tr>
                                    <th>お問い合わせ内容</th>
                                    <td>{{ $contact->detail }}</td>
                                </tr>
                            </table>

                            <button type="button" onclick="document.getElementById('modal-{{ $contact->id }}').close()">
                                閉じる
                            </button>
                        </dialog>
                    </td>
                    <td>
                        <form action="/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $contact->id }}">
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            {{ $contacts->links() }}
        </div>
    </main>
</body>
</html>