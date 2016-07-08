@extends('layouts.default')
{{--@section('title', '')--}}
@section('content')
    <img width="100%" src="/images/sense.jpg">
    <!--page bar 所在位置-->
    <section class="sn-page-bar">

        <div class="wrap text-left sn-pb-content">
            <span>您现在的位置：</span>
            <span>我们</span> <span>></span>
            <span ><a href="javascript:void(0);" class="js_location_url" data-url="we_news">公司新闻</a></span>

            <div class="fr">
                <a href="javascript:void(0);" class="color-blue js_prev_btn" >上一篇</a>
                <span class="margin-l-10">/</span>
                <a href="javascript:void(0);" class="color-blue margin-l-10 js_next_btn">下一篇</a>
            </div>
        </div>
    </section>

    <section class="text-left">
        <div class="wrap sn-big-title color-blue">
            公司新闻
        </div>
    </section>

    <section class="sn-we-news text-left js_news_list">
        <div class="wrap clear-fix ">
            <p class="sn-wen-title">{{ $news->title }}</p>
            <p class="sn-wen-content">
                {{ $news->content }}
            </p>
        </div>
    </section>
@stop
