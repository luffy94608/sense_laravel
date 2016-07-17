@extends('layouts.default')

@inject('funcTools', 'App\Tools\FuncTools')
@section('title', $menuInfo->page->title)
@section('keywords', $menuInfo->page->keywords)
@section('description', $menuInfo->page->description)

@section('content')

{{--page bar 所在位置--}}
@include('layouts.crumb',['menuInfo'=>$menuInfo])

{{--<section class="text-left">--}}
    {{--<div class="wrap sn-big-title color-blue">--}}
        {{--{{ $menuInfo->name }}--}}
    {{--</div>--}}
{{--</section>--}}


<!--container list-->
<section class="sn-we-route text-left">
    <div class="wrap">
        <p class="sn-wr-title">{{ $menuInfo->name }}</p>
        <div class="sn-wr-list">
            <i class="sn-through-line"></i>
            <i class="icon-self-time"></i>

            @foreach($list as $v)
                <ul class="sn-wr-item">
                    <li class="title">{{ $v->name }}<i class="sn-wr-arrow"></i></li>

                    @foreach($v->children as $subItem)
                        <li><i class="prefix-short-line"></i>{{ $subItem->name }}</li>
                    @endforeach

                </ul>
            @endforeach


        </div>
    </div>
</section>

@stop
