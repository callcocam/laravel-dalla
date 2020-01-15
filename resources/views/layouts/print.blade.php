<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $tenant->name }}</title>

    <link href="{{ asset('_dist/admin/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
    <!-- Styles -->
</head>
<body>
@yield('content')
</body>
</html>
