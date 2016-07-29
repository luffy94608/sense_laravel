<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','软件加密狗_加密锁_授权管理_云加密|云授权平台-北京深思数盾')</title>
    <meta name="keywords" content="@yield('keywords','')">
    <meta name="description" content="@yield('description','')">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--[if lt IE 9]>
        <script src="/bower_components/html5shiv/dist/html5shiv.min.js"></script>
    <![endif]-->
    <link type="text/css" rel="stylesheet" href="/styles/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="/styles/main.css">
    <link type="text/css" rel="stylesheet" href="/bower_components/bxslider-4/dist/jquery.bxslider.min.css">
    <script charset="utf-8" type="text/javascript" src="http://wpa.b.qq.com/cgi/wpa.php?key=XzkzODA1NDQ1OF8zNTQwMDNfNDAwNjUwNjcwMV8"></script>
    <script type="text/javascript">
        document.global_config_data = {
            version: '{{Config::get('app')['version']}}',
            page:'{{isset($page) ? $page : 'base'}}',
            resource_root: '{{Config::get('app')['url']}}'
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

<script src='/bower_components/requirejs/require.js' data-main='/scripts/main.js' type='text/javascript'></script>
</body>
</html>
