@extends('layouts.default')

@inject('funcTools', 'App\Tools\FuncTools')
@section('title', $menuInfo->page->title)
@section('keywords', $menuInfo->page->keywords)
@section('description', $menuInfo->page->description)

@section('content')

{{--page bar 所在位置--}}
<img width="100%" src="{{ $funcTools->resourceUrl($menuInfo->page->banner) }}">
<!--page bar 所在位置-->
<section class="sn-page-bar">
    <div class="wrap text-left sn-pb-content">
        <span>您现在的位置：</span>
        <span>产品</span>
        <span> > </span>
        {!! $funcTools->toBuildBreadCrumbHtml($menuInfo) !!}
    </div>
</section>

<!--container list-->
<section class="sn-lock-list  clear-fix">
    <div class="wrap text-left">
        <ul class="snl-list">
            @foreach($list as $v)
                <li>
                    <div class="fl sn-ll-pic">
                        <img class="ll-pic" src="{{ $funcTools->resourceUrl($v->img) }}">
                        <div class="ll-pic-list">
                            @foreach( $v->locks as $lock)
                                <a href="/lock-detail/{{ $lock->id }}?mid={{ $v->menu->id }}">
                                    <div class="ll-pl-item clear-fix">
                                        <img src="{{ $funcTools->resourceUrl($lock->pic) }}">
                                        <p>{{ $v->name }}-{{ $lock->version }}</p>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                    <div class="fr sn-ll-detail">
                        <p class="ll-title">{{ $v->name }}——{{ $v->title }}</p>
                        <p class="ll-desc">
                            {{ $v->content }}
                        </p>
                        <p class="ll-link">
                            @foreach( $v->locks as $k=>$lock)
                                @if( $k==0 )
                                    <a class="color-orange "  href="/lock-detail/{{ $lock->id }}?mid={{ $v->menu->id }}">了解更多</a>
                                @endif
                            @endforeach
                        </p>
                    </div>
                </li>

            @endforeach
        </ul>
    </div>
</section>


@stop
