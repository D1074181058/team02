<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
</head>
<body class="antialiased">
<div class="flex-center position-ref full-height">
     <div class="content">
         @include("header")
         @include("footer")
         @yield("pokemon_contents")

     </div>
</div>
</body>
</html>
