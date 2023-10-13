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
        <p>・サークル名、イベント名、場所のキーワードを検索できます。</p>
        <p>・日時は2000-01-01の形式で検索してください。</p>
    </div>

</body>

</html>
