<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>大崗國中原民舞蹈社管理系統</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('style.css') }}">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="{{  URL::asset('semantic.min.js') }}"></script>
    </head>
    <body>

        <div class="ui menu inverted">
            <div class="header item">
                原民舞蹈社管理系統
            </div>
            <a class="item" href="{{ url('/admin') }}">
                學員
            </a>
            <a class="item">
                出席
            </a>
            <a class="item">
                保險冊
            </a>
        </div>
        <div class="ui container">
            @yield('content')
        </div>

    </body>
</html>
