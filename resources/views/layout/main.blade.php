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
        </div>

        <div class="ui container">

            <div class="ui grid">

                <div class="four wide column computer only">

                    <div class="ui secondary vertical pointing menu">
                        <a class="item" href="{{ url('/admin') }}">
                            學員
                        </a>
                        <a class="active item" href="{{ url('/admin/attend') }}">
                            點名
                        </a>
                        <a class="item" href="{{ url('/admin/attend/total') }}">
                            缺勤
                        </a>
                        <a class="item" href="{{ url('/admin/insurance') }}">
                            保險冊
                        </a>
                    </div>

                </div>

                @yield('content')
        </div>

    </body>
</html>
