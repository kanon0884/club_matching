<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>イベント登録</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1 class="title">イベント登録</h1>
    <div class="content">
        <form action="/events" method="POST">
            @csrf <!-- CSRFトークンを含める -->
            
            <!-- イベント名 (title) フィールド -->
            <div class="form-group">
                <label for="title">イベント名</label>
                <input type="text" id="title" name="event[title]" required>
            </div>
            
            <!-- 開催場所 (place) フィールド -->
            <div class="form-group">
                <label for="place">開催場所</label>
                <input type="text" id="place" name="event[place]" required>
            </div>
            
            <!-- 開催日時 (datetime) フィールド -->
            <div class="form-group">
                <label for="datetime">開催日時</label>
                <input type="datetime-local" id="datetime" name="event[datetime]" required>
            </div>
            
            <!-- 詳細 (description) フィールド -->
            <div class="form-group">
                <label for="description">詳細</label>
                <textarea id="description" name="event[description]" rows="4" required></textarea>
            </div>
            
            <!-- user_id 値を提供する非表示のフィールド -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            
            <!-- 送信ボタン -->
            <button type="submit" value="store">登録</button>
        </form>
    </div>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>
