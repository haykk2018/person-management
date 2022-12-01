<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Management</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
@foreach($people as $person)
    <div>

        <div>{{$person->fname}}</div>
        <div>{{$person->lname}}</div>
        <div>{{$person->email}}</div>
        <div>{{$person->tel}}</div>
        <div>
            @foreach($person->sports as $sport)
                <p>Favorite sports: {{$sport->name}}</p>
            @endforeach
        </div>

    </div>
    <p><a href="/edit/{{$person->id}}/">edit person</a></p>
    <p><a href="/view/{{$person->id}}/">view person</a></p>
    <form action="delete/{{$person->id}}" method="POST" enctype="multipart/form-data">
        @method('DELETE')
        @csrf
        <button type="submit">delete</button>
    </form>
    <hr>
@endforeach
<a href="create">new person</a>
</body>
</html>
