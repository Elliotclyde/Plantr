<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plantr Login</title>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
    <h1>Plantr 2.0 Login</h1>
    <form action="/login" method="post">
    @csrf
    <label for="username">Username</label>
    <input type="username" name="username" id="username">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="submit">
    </form>

    </body>
</html>
