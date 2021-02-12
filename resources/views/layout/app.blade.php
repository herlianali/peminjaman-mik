<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div id="app">

    </div>

    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>