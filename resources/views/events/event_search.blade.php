<!DOCTYPE HTML>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>events</title>

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>

<body>
    <div class=events_search>
    <h1>イベント検索</h1>
        <form action="/events/search/results" method="GET">
            <input type="text" name="query" placeholder="イベントを検索">
            <button type="submit">検索</button>
        </form>
        <p>サークル名orイベント名or場所のキーワードを入力してください！</p>
        <form action="/events/search/results" method="GET">
            @csrf
            <label for="start_date">開始日:</label>
            <input type="date" name="start_date" id="start_date">
        
            <label for="end_date">終了日:</label>
            <input type="date" name="end_date" id="end_date">
        
            <button type="submit">検索</button>
        </form>
    </div>

</body>

</html>
