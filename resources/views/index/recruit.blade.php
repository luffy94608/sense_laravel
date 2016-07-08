@extends('layouts.default')
{{--@section('title', '')--}}
@section('content')
    <img width="100%" src="images/sense.jpg">

    <!--page bar 所在位置-->
    <section class="sn-page-bar">

        <div class="wrap text-left sn-pb-content">
            <span>您现在的位置：</span>
            <span>我们</span> <span>></span>
            <span class="active">诚聘精英</span>
        </div>
    </section>

    <!--container list-->
    <section class="text-left">
        <div class="wrap sn-big-title color-blue">
            诚聘精英
        </div>
    </section>

    <section class="sn-we-rct margin-t-20">
        <div class="wrap clear-fix text-left">
            <ul class="sn-wr-list">
                @foreach($list as $v)
                    <li>
                        <div class="sn-wrl-head circle">
                            <span class="sn-wlh-title"><i class="icon-circle"></i>{{ $v->title }}</span>
                            <span class="sn-wlh-time">发布日期：{{ $v->created_at }}</span>
                            <i class="icon-double-angle-down arrow"></i>
                        </div>
                        <div class="sn-wrl-desc 1">
                            <div class="sn-wr-ld-item">
                                <span>工作地点：</span>
                                <span>{{ $v->location }}</span>
                            </div>
                            <div class="sn-wr-ld-item">
                                <span>招聘人数：</span>
                                <span>{{ $v->num }}</span>
                            </div>
                            <div class="sn-wr-ld-item">
                                <span>工作经验：</span>
                                <span>{{ $v->experience }}</span>
                            </div>
                            <div class="sn-wr-ld-item">
                                <span>学历要求：</span>
                                <span>{{ $v->degree }}</span>
                            </div>
                            <div class="sn-wr-ld-item">
                                <span>工作性质：</span>
                                <span>{{ $v->nature }}</span>
                            </div>
                            <div class="sn-wr-ld-item">
                                <span >薪资范围：</span>
                                <span>{{ $v->salary }}</span>
                            </div>

                            @if($v->duty)
                                <div class="sn-wr-ld-item block">
                                    <span >岗位职责：</span>
                                    <div class="sn-wrli-content">{{ $v->duty }}
                                    </div>
                                </div>
                            @endif

                            @if($v->requirement)
                                <div class="sn-wr-ld-item block">
                                    <span >岗位要求：</span>
                                    <div class="sn-wrli-content">{{ $v->requirement }}
                                    </div>
                                </div>
                            @endif

                        </div>
                    </li>

                @endforeach

            </ul>
        </div>
    </section>
@stop
