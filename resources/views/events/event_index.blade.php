<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Events</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>イベント一覧</h1>
        <div class='events'>
            @foreach($events as $event)
                <div class='event'>
                    <h2 class='title'>
                        <a href="/events/{{ $event->id }}">【{{ $event->user->club }}】{{ $event->title }} {{ $event->datetime }}</a>
                
                    </h2>
                    <form action="/events/{{ $event->id }}" id="form_{{ $event->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $event->id }})">イベントを削除</button>
                    </form>
                </div>
            @endforeach
        </div>
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
        }
        </script>
    </body>
    <a href=/>戻る</a>
</html>
