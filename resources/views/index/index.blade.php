@inject('funcTools', 'App\Tools\FuncTools')

@extends('layouts.default')
{{--@section('title', '')--}}
{{--@section('keywords', '')--}}
{{--@section('description', '')--}}
@section('content')

<!--轮播图-->
@if( $banners )
    <div class="sn-slide-section" style="height: 450px;overflow: hidden;">
        <ul class="sn_bxslider">

            @foreach( $banners as $banner)
                <li>
                    <div class="sn-swiper-item" style="visibility: hidden">
                        <div class="wrap text-left">
                            <p>{{ $banner->title }}</p>
                            <p>{{ $banner->sub_title }}</p>
                            @if( $banner->btn_name )
                                <a href="{{ $banner->btn_url }}" target="_blank" class="reg-btn " >{{ $banner->btn_name }}</a>
                            @endif
                        </div>
                    </div>
                    <img  src="{{ $funcTools->resourceUrl($banner->img) }}" width="100%">
                </li>
            @endforeach
        </ul>
    </div>
@endif

<!--container-->
@if( $list )
    <section class="sn-phc-menu ">
        <div class="wrap clear-fix ">
            <p class="sn-phcm-title">深思云授权助力软件企业互联网化</p>
            <ul class="sn-phcm-list">
                @foreach($list as $k=>$v)
                    <li class="{{ $k == 0  ? 'active' : ''}}">
                        <a href="#sn_phc_menu_{{ $v->id }}">
                            <img src="{{ $funcTools->resourceUrl($k == 0 ? $v->icon_active : $v->icon) }}" data-icon="{{ $funcTools->resourceUrl($v->icon) }}" data-active="{{ $funcTools->resourceUrl($v->icon_active) }}">
                            <p>{{ $v->title }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif


@if( $list )
    @foreach($list as $k => $v)
        <section  class="sn-phc-item border-bottom-grey">

            <div id="sn_phc_menu_{{ $v->id }}" class="wrap clear-fix text-left sn_phc_menu">
                <div class="snphc-desc {{ $v->position == 1 ? 'fr' : 'fl' }}">
                    <div class="sn-phcd-center">

                        <div class="snphc-tag">{{ $v->title }}</div>
                        <div class="snphc-title">{{ $v->sub_title }}</div>
                        <div class="snphc-abstract pre-line">
                            {{ $v->content }}
                        </div>
                        <div class="snphc-link">
                            @if($v->links)
                                @foreach( $v->links  as $link)
                                    <a class="color-orange " href="{{ $link->url }}" target="{{ $link->target }}">{{$link->name}}</a><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="snphc-img {{ $v->position == 1 ? 'fl' : 'fr' }}">
                    <img src="{{ $funcTools->resourceUrl($v->pic) }}">
                </div>
            </div>
        </section>
    @endforeach
@endif


<!--合作伙伴-->
@if( $banners )
    <section class="sn-partners">
        <div class="wrap clear-fix">
            <p class="sm-p-title">我们的合作伙伴</p>
            <div class="sn-partners-slide">
                <ul class="sn_partners_slide">

                    @foreach( $partners as $partner)
                        <li class="">
                            <div class="sn-partners-item">
                                <a href="{{ $partner->url }}" target="_blank">
                                <img src="{{ $funcTools->resourceUrl($partner->logo) }}">
                                </a>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
@endif


@stop
