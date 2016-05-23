<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SocialMedia 65+</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    </head>
    <body>
        @include('templates.partials.navigation')
        <div class="container">
            @include('templates.partials.alerts')
            @yield('content')
        </div>
        <script type="text/javascript" src="{{ url('js/jquery-1.12.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/timeline.js') }}"></script>
    </body>
</html>