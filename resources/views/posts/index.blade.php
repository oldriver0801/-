<!DOCTYPE html>
<x-app-layout>
<x-slot name="header">
    index
</x-slot>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    </head>
    <body>
        <h1>Blog Name</h1>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href="/posts/{{ $post->id }}"><h2 class='title'>{{$post->title}}</h2></a>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                </div>
            @endforeach
            </div>
            <div class='paginate'>{{ $posts->links() }}</div>
            <script>
                function deletePost(id) {
                    'use scrict'
                    
                    if(confirm('削除すると復元できません\n本当に削除しますか？')) {
                        document.getElemetById('form_${id}').submit();
                    }
                }
            </script>
             <p>ログインユーザー {{ Auth::user()->name }}</p>
    </body>
</html>
</x-app-layout>