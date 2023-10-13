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


    <h1 class="title">
        
        {{ $event->user->club }}
        {{ $event->title }}

    </h1>

    <div class="content">

        <div class="content__event">

            <p>{{ $event->datetime }}</p>

            <p>{{ $event->place }}</p>

            <p>{{ $event->description }}</p>

        </div>

    </div>

    <div class="footer">

    <a href="/events">戻る</a>

    </div>
    
    <div class="edit">
        <a href="/events/{{ $event->id }}/edit">編集</a>
    </div>

</body>

</html>
