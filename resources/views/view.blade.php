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
<p><input name="fname" id="fname" value="{{$person->fname}}" type="text" readonly/></p>
<p><input name="lname" id="lname" value="{{$person->lname}}" type="text" readonly/></p>
<p><input name="email" id="email" value="{{$person->email}}" type="text" readonly/></p>
<p><input name="tel" id="tel" value="{{$person->tel}}" type="text" readonly/></p>
<p><input name="birth" id="birth" value="{{$person->birth}}" type="date" readonly /></p>


@foreach($person->sports as $sport)
    <input type="checkbox" id="{{$sport->id}}" name="sports[]" value="{{$sport->id}}" checked disabled>
    <label for="{{$sport->name}}">{{$sport->name}}</label>
@endforeach

</body>
</html>
