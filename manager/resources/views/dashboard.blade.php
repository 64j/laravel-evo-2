<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{ route('dashboard') }}/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('global.site_name') }} (Evolution CMS Manager Login)</title>
    <script>
      localStorage['EVO.TOKEN'] = 'Bearer {{ session('_token') }}'
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="group/body">
<div id="app"></div>
</body>
</html>
