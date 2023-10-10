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
        <form action="/events/{{ $event->id }}" method="POST">
            @csrf <!-- CSRFトークンを含める -->
            @method('PUT')
            <!-- イベント名 (title) フィールド -->
            <div class="form-group">
                <label for="title">イベント名</label>
                <input type="text" id="title" name="event[title]" value="{{ $event->title }}">
            </div>
            
            <!-- 開催場所 (place) フィールド -->
            <div class="form-group">
                <label for="place">開催場所</label>
                <input type="text" id="place" name="event[place]" value="{{ $event->place }}">
            </div>
            
            <!-- 開催日時 (datetime) フィールド -->
            <div class="form-group">
                <label for="datetime">開催日時</label>
                <input type="datetime-local" id="datetime" name="event[datetime]" value="{{ $event->datetime }}">
            </div>
            
            <!-- 詳細 (description) フィールド -->
            <div class="form-group">
                <label for="description">詳細</label>
                <textarea id="description" name="event[description]" rows="4">{{ $event->description }}</textarea>
            </div>
            <!-- 送信ボタン -->
            <button type="submit" value="store">更新</button>
        </form>
    </div>
    <div class="footer">
        <a href="/events">戻る</a>
    </div>
</body>
</html>
