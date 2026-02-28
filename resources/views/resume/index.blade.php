<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resume</title>

    </head>
    <body>
        <h1>Resume Index</h1>
        <p>
            Hello {{ $resume->basics->name }} ({{ $resume->basics->label }}) <br>
        </p>
    </body>
</html>
