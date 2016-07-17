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

<section class="sn-we-rct margin-t-20">
    <div class="wrap clear-fix text-left min-height-400">
        <ul class="sn-wrn-list">

            @foreach($news as $new)
                <li>
                    <a href="/news-detail/{{ $new->id }}?mid={{ $menuInfo->id }}" >
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
