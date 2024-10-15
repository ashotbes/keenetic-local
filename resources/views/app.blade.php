<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/app.css">
    <title>Laravel</title>

    @vite('resources/js/app.js')
    @inertiaHead
</head>
<style>

    #app {
        font-family: Roboto Condensed, sans-serif;
        font-size: 18px;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-weight: 300;
        color: #000000;
        background: lightblue;
    }

    body {
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100vh;
        background: lightblue;
    }

</style>
<body>
@inertia
</body>
</html>
