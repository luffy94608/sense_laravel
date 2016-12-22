@extends('layouts.default')

@inject('funcTools', 'App\Tools\FuncTools')
@section('title', $menuInfo->page->title)
@section('keywords', $menuInfo->page->keywords)
@section('description', $menuInfo->page->description)

@section('content')

{{--page bar 所在位置--}}
@include('layouts.crumb',['menuInfo'=>$menuInfo])

<section class="text-left">
    <div class="wrap sn-big-title color-blue">
        {{ $menuInfo->name }}
    </div>
</section>

<section  class="sn-cl-section text-left">
    <div class="wrap clear-fix text-left">
        <img class="fr margin-t-10" src="{{ $funcTools->resourceUrl($menuInfo->page->extra) }}">

        @foreach($menuInfo->page->contents as $content)
            <div class="sn-cls-item">
                <p class="sn-cls-title">{{ $content->title }}</p>
                <p class="sn-cls-sub-title">{{ $content->sub_title }}</p>
                <p class="sn-cls-desc">{{ $content->content }}
                </p>
                @foreach($content->links as $link)
                    <br>
                    <a class="color-orange  animate_hover_move relative" href="{{ $funcTools->resourceUrl($link->url) }}" target="{{ $link->target }}" > {{ $link->name }}</a><br>
                @endforeach
            </div>
        @endforeach

    </div>
</section>

@stop
