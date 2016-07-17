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


<div class="sn-we-ipr margin-t-20">
    <div class="wrap clear-fix ">
        <div class="sn-sub-title margin-t-20 text-left">
            {{ $menuInfo->page->extra }}
        </div>
        <ul class="swi-list {{ $certType == \App\Models\Enums\CommonEnum::CertTypeProperty? ' property-list' : '' }}">
            @foreach($list as $v)
                <li>
                    <div class="swi-pic">
                        <img src="{{ $funcTools->resourceUrl($v->pic) }}" >
                    </div>
                    <div class="swi-desc">{{ $v->name }}</div>
                </li>
            @endforeach

        </ul>
    </div>
</div>
@stop
