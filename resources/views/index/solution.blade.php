@extends('layouts.default')

@inject('funcTools', 'App\Tools\FuncTools')
@section('title', $menuInfo->page->title)
@section('keywords', $menuInfo->page->keywords)
@section('description', $menuInfo->page->description)

@section('content')

{{--page bar 所在位置--}}
@include('layouts.crumb',['menuInfo'=>$menuInfo,'showCloud'=>true])

<section class="text-left">
    <div class="wrap sn-big-title color-blue">
        {{ $menuInfo->name }}
    </div>
</section>

<section>
    <div class="wrap text-left clear-fix">
        <ul class="sn-su-list">
            @foreach($list as $v)
                <a href="{{ $funcTools->menuUrl(!is_null($v->menu) ? $v->menu : '' ) }}">
                    <li>
                        <img src="{{ $funcTools->resourceUrl($v->pic) }}">
                        <p class="sn-sul-title">{{ $v->name }}</p>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
</section>

<section class="clear-fix sn-su-footer ">
    <div class="wrap sn-suf-detail text-left">
        <p class="sn-sufd-title">专业、专注安全，是每个深思人的追求</p>
        <p>
            无论您来自哪个软件领域，我们都有专家了解您行业所面临的特殊挑战，深知满足客户需求的重要性。深思数盾强大的安全云授权解决方案，帮助了不同领域软件企业的引领者，建立起互联网销售模式和更深层次的客户关系。我们也可以为您的企业做到这些。
        </p>
    </div>
</section>

<section class="clear-fix sn-su-footer">
    <img src="/images/footer.jpg" width="100%">
    <div class="wrap sn-suf-content">
        <p>一对一深度沟通 , 解决方案专家直通车</p>
        <a href="javascript:void(0);" id="BizQQWPA3" class="sn-suf-btn">联系我们</a>
    </div>
</section>


@stop
