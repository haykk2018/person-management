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
<form action="/xx.php">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname"><br><br>
    <p>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday">
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </p>
    <p>
        <label for="tel">Tel:</label>
        <input type="tel" id="tel" name="tel">
    </p>
    <fieldset>
        <legend>Favorite sports</legend>
        <div>
            <input type="checkbox" id="football" name="fav_sports" value="football">
            <label for="football"> Football </label><br>
            <input type="checkbox" id="box" name="fav_sports" value="box">
            <label for="box"> Box </label><br>
        </div>
    </fieldset>


    <input type="submit" value="Submit">
</form>
</body>
</html>
