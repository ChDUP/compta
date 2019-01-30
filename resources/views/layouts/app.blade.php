<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Faktur') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/faktur.css') }}">
</head>

<body>
    @include('layouts.navigation')
    <div class="container">
        <div class="columns">
                @include('layouts.left-column')
            <div class="column is-9">
                @include('layouts.header')
                @include('layouts.tiles')
                <div class="columns">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
