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

<section class="sn-lock-detail">
    <div class="wrap text-left">
        <div class="sn-tab-content clear-fix">
            @foreach($types as $type)
                <div class="sn-tab-pane active">
                    <p class="sn-ld-section-title color-blue bolder">{{ $type->name }}</p>
                    <ul>
                        @foreach($type->downloads as $download)
                            <li>
                                <p class="sn-ld-title">{{ $download->name }}</p>
                                <p class="sn-ld-desc">
                                    {{ $download->content }}
                                </p>
                                <div class="sn-ld-btn-list">
                                    <a class="sn-ld-btn download text-center" href="{{ $funcTools->resourceUrl($download->url) }}">{{ $download->btn_name }}</a>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>

            @endforeach



        </div>
    </div>
</section>

@stop
