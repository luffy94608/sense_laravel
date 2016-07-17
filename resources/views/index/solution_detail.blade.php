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
        {{ $detail->name }} : {{ $detail->title }}
    </div>
</section>

<section class="sn-common-list">
    <div class="wrap text-left">
        <div class="sn-cl-item">
            <p class="sn-cli-title">背景和需求</p>
            <p class="sn-cli-desc">
                {{ $detail->demand }}
            </p>
        </div>
        <div class="sn-cl-item">
            <p class="sn-cli-title">解决方案</p>
            <p class="sn-cli-desc">
                {{ $detail->plan }}
            </p>
        </div>
        <div class="sn-cl-item">
            <p class="sn-cli-title">优势</p>
            <p class="sn-cli-desc">
                {{ $detail->advantage }}
            </p>
        </div>
    </div>
</section>


<section class="clear-fix sn-su-footer">
    <img src="images/footer.jpg" width="100%">
    <div class="wrap sn-suf-content">
        <p>一对一深度沟通 , 解决方案专家直通车</p>
        <a href="javascript:void(0);" id="BizQQWPA3" class="sn-suf-btn">联系我们</a>
    </div>
</section>


@stop
