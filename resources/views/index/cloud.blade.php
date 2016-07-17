@extends('layouts.default')

@inject('funcTools', 'App\Tools\FuncTools')
@section('title', $menuInfo->page->title)
@section('keywords', $menuInfo->page->keywords)
@section('description', $menuInfo->page->description)

@section('content')

{{--page bar 所在位置--}}
@include('layouts.crumb',['menuInfo'=>$menuInfo])

        <!--精锐 5 标准版-->
<section class="sn-lock-detail border-bottom-blue">
    <div class="wrap text-left">
        <ul class="sn-nav-tabs ">
            @foreach($clouds as $k=>$cloud)
                <li class="{{ $k==0 ? 'active' : '' }}">
                    <a data-id="#tab_{{ $cloud->id }}" href="javascript:void (0);" >{{ $cloud->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
<section class="sn-lock-detail">
    <div class="wrap text-left">
        <div class="sn-tab-content clear-fix">
            @foreach($clouds as $k=>$cloud)
                <div id="tab_{{ $cloud->id }}" class="sn-tab-pane {{ $k==0 ? 'active' : '' }}"">
                    @if($cloud->type == 0)
                    <section class="sn-we-rct margin-t-20">
                        <div class="wrap clear-fix text-left">
                            <ul class="sn-wr-list">
                                @foreach( $cloud->params as $item)
                                    <li>
                                        <div class="sn-wrl-head circle">
                                            <span class="sn-wlh-title"><i class="sn-wlh-sort"></i> {{ $item->name }}</span>
                                            <span class="sn-wlh-time"></span>
                                            <i class="font-size-24 icon-angle-up arrow"></i>
                                        </div>
                                        <div class="sn-wrl-desc">
                                            <div class="sn-wr-ld-txt pre-line">
                                                {{ $item->content }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                    @else
                        @foreach( $cloud->types as $type)
                        <p class="sn-ld-section-title color-blue bolder">{{ $type->name }}</p>
                        <ul>
                            @foreach( $type->files as $download)
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
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

@stop
