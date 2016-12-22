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

@foreach($menuInfo->page->contents as $k=>$content)

    <section  class="sn-pt-section {{ $k == count($menuInfo->page->contents)-1 ? '' :'border-bottom-grey' }} text-left">
        <div class="wrap clear-fix text-left">
            <div class="sn-pt-item">
                <p class="sn-pti-title">{{ $content->title }}</p>
                <p class="sn-pti-sub-title">{{ $content->sub_title }}</p>
                <p class="sn-pti-desc pre-line">{{ $content->content }}
                </p>
                @foreach($content->links as $link)
                    <br>
                    <a class="color-orange  animate_hover_move relative" href="{{ $funcTools->resourceUrl($link->url) }}" target="{{ $link->target }}" > {{ $link->name }}</a><br>
                @endforeach
            </div>
        </div>
    </section>

@endforeach

@stop
