<!DOCTYPE html>
<html ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>
            @section('title')
                {{ config('app.name') }} - Change log
            @show
        </title>

        <!-- Styles -->
        <style>
            {!! file_get_contents(base_path('vendor/webbundels/changelog/resources/assets/css/app.css')) !!}
        </style>
        <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600,700,800" rel="stylesheet">
    </head>

    <body id="@yield('body_id')">
        @yield('content')
        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
        @yield('scripts')
        <script type="text/javascript">
            {!! file_get_contents(base_path('vendor/webbundels/changelog/resources/assets/js/app.js')) !!}
        </script>
    </body>
</html>