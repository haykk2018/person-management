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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/" method="post">
    @csrf
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" value="{{ old('fname') }}"><br><br>
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname" value="{{ old('lname') }}"><br><br>
    <p>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birth" name="birth" value="{{ old('birth') }}">
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
    </p>
    <p>
        <label for="tel">Tel:</label>
        <input type="tel" id="tel" name="tel" value="{{ old('tel') }}">
    </p>
    <fieldset>
        <legend>Favorite sports</legend>
        @foreach($sports as $sport)
            <input type="checkbox" id="{{$sport->id}}" name="sports[]" value="{{$sport->id}}"
                   @if(is_array(old('sports')) and in_array($sport->id, old('sports'))) checked @endif>
            <label for="{{$sport->name}}">{{$sport->name}}</label>
        @endforeach
    </fieldset>

    <input type="submit" value="Submit">
</form>
</body>
</html>
