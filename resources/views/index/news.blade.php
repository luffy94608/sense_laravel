@extends('layouts.default')
{{--@section('title', '')--}}
@section('content')
        <!--<div class="sn-blue-bg"></div>-->
<img width="100%" src="/images/sense.jpg">
<!--page bar 所在位置-->
<section class="sn-page-bar">

    <div class="wrap text-left sn-pb-content">
        <span>您现在的位置：</span>
        <span>我们</span> <span>></span>
        <span class="active">公司新闻</span>
    </div>
</section>

<section class="text-left">
    <div class="wrap sn-big-title color-blue">
        公司新闻
    </div>
</section>

<section class="sn-we-rct margin-t-20">
    <div class="wrap clear-fix text-left min-height-400">
        <ul class="sn-wrn-list">

            @foreach($news as $new)
                <li>
                    <a href="/news-detail/{{ $new->id }}" >
                        <div class="sn-wrl-head circle">
                            <span class="sn-wlh-title"><i class="icon-circle"></i>{{ $new->title }}</span>
                            <span class="sn-wlh-time"></span>
                        </div>
                        <div class="sn-wrl-desc"></div>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</section>
@stop
