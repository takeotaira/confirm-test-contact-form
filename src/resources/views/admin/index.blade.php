<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="header__inner">
                <h1 class="header__logo">FashionablyLate</h1>

                <form action="/logout" method="post">
                    @csrf
                    <button type="submit">logout</button>
                </form>
            </div>
        </header>

        <main class="main admin">
            <h2 class="page-title">Admin</h2>

            <form class="admin-search" action="/search" method="get">
                <input class="admin-search__input" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">

                <select class="admin-search__select" name="gender">
                    <option value="">性別</option>
                    <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                </select>

                <select class="admin-search__select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>

                <input class="admin-search__date" type="date" name="created_at" value="{{ request('created_at') }}">

                <button class="admin-search__button" type="submit">検索</button>
            </form>

            <form action="/export" method="get">
                <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                <input type="hidden" name="date" value="{{ request('date') }}">
                <button class="button" type="submit">エクスポート</button>
            </form>

            <a class="admin-search__reset" href="/reset">リセット</a>

        <div class="admin-table__wrap">
            <table class="admin-table">
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
                            <button  class="admin-table__button" type="button" onclick="document.getElementById('modal-{{ $contact->id }}').showModal()">
                                詳細
                            </button>

                            <dialog class="modal" id="modal-{{ $contact->id }}">
                                <div class="modal__content">
                                    <button
                                        class="modal__close"
                                        type="button"
                                        onclick="document.getElementById('modal-{{ $contact->id }}').close()"
                                    >
                                        ×
                                    </button>

                                    <table class="modal-table">
                                        <tr>
                                            <th>お名前</th>
                                            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                                        </tr>

                                        <tr>
                                            <th>性別</th>
                                            <td>
                                                {{ ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender] ?? '' }}
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
                                </div>
                            </dialog>
                        </td>
                        <td>
                            <form action="/delete" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                <button class="admin-table__button admin-table__button--delete" type="submit">削除</button>
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