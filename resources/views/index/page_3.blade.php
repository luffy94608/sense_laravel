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

    <section  class="sn-phc-item {{ $k == count($menuInfo->page->contents)-1 ? '' :'border-bottom-grey' }} ">
        <div class="wrap clear-fix text-left">
            <div class="snphc-desc {{ $content->position == 1 ? 'fr' : 'fl' }}">
                <div class="sn-phcd-center">
                    <div class="snphc-title ">{{ $content->title }}</div>
                    <div class="snphc-title-2 ">{{ $content->sub_title }}</div>
                    <div class="snphc-abstract pre-line">
                        {!! $content->content !!}
                    </div>
                    <div class="snphc-link">
                        @foreach($content->links as $link)
                            <a class="color-orange  animate_hover_move relative" href="{{ $funcTools->resourceUrl($link->url) }}" target="{{ $link->target }}" > {{ $link->name }}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="snphc-img {{ $content->position == 1 ? 'fl' : 'fr' }}">
                <img class="snphc-img" src="{{ $funcTools->resourceUrl($content->pic) }}">
            </div>
        </div>
    </section>


@endforeach

@stop
