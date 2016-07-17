@extends('layouts.default')

@inject('funcTools', 'App\Tools\FuncTools')
@section('title', $menuInfo->page->title)
@section('keywords', $menuInfo->page->keywords)
@section('description', $menuInfo->page->description)

@section('content')
    <img width="100%" src="{{ $funcTools->resourceUrl($menuInfo->page->banner) }}">
    <!--page bar 所在位置-->
    <section class="sn-page-bar">
        <div class="wrap text-left sn-pb-content">
            <span>您现在的位置：</span>
            {!! $funcTools->toBuildBreadCrumbHtml($menuInfo,true,true) !!}

            <div class="fr">
                <a href="{{ $prevUrl }}" class="color-blue " >上一篇</a>
                <span class="margin-l-10">/</span>
                <a href="{{ $nextUrl }}" class="color-blue margin-l-10 ">下一篇</a>
            </div>
        </div>
    </section>

    <section class="text-left">
        <div class="wrap sn-big-title color-blue">
            {{ $menuInfo->name }}
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
