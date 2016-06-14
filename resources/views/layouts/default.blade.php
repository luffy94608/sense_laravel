<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>@yield('title','软件加密狗_加密锁_授权管理_云加密|云授权平台-北京深思数盾')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/bower_components/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="/styles/font-awesome.css">

    <script charset="utf-8" type="text/javascript" src="http://wpa.b.qq.com/cgi/wpa.php?key=XzkzODA1NDQ1OF8zNTQwMDNfNDAwNjUwNjcwMV8"></script>

    {{--<link rel="stylesheet" href="/styles/font-awesome.css">--}}
    <script type="text/javascript">
        document.global_config_data = {
            version: '{{Config::get('app')['version']}}',
            page:'{{isset($page) ? $page : 'base'}}',
            resource_root: '{{Config::get('app')['url']}}',
        };

    </script>
</head>
<body>

{{--header--}}
@include('layouts.header',[])

{{--内容区域--}}
@section('content')
@show

{{--footer--}}
@include('layouts.footer',[])
<script src='/bower_components/movejs/move.min.js' type='text/javascript'></script>
<script src='/bower_components/requirejs/require.js' data-main='/scripts/main.js' type='text/javascript'></script>
</body>
</html>
