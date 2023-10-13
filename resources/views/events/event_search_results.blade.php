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

    <div class=events_search_results>
    <h1>イベント検索結果</h1>
        @foreach($events as $event)
            <div class="event">
                <h2>【{{ $event->user->club}}】{{ $event->title }}</h2>
                <p>{{ $event->place }}{{ $event->datetime }}</p>
            </div>
        @endforeach
    </div>

</body>

</html>
