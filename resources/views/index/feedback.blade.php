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

<section class="sn-feedback margin-t-50">
    <div class="wrap text-left clear-fix">
        <div class="sn-fd-form feedback_form">
            <div class="sm-fdf-item fl">
                <p>姓名</p>
                <input type="text" name="name" placeholder="请输入真实姓名" required>
            </div>
            <div class="sm-fdf-item fl">
                <p>邮箱</p>
                <input type="text" name="email" placeholder="请输入合法的邮箱" required>
            </div>
            <div class="sm-fdf-item full">
                <p>留言</p>
                <textarea name="content" required placeholder="请输入留言内容"></textarea>
            </div>
            <button class="sm-fdf-btn feedback_submit_btn" type="button">提交</button>
        </div>
        <div class="sn-fd-info margin-t-50">
            <p><img src="/images/feedback/email.png">sales@sense.com.cn</p>
            <p><img src="/images/feedback/calling.png">400-6506-701</p>
            <p><img src="/images/feedback/fax.png">010-82503956</p>
            <p><img src="/images/feedback/QQ.png">4006506701</p>
            <p><img src="/images/feedback/wechat.png">senseshield</p>
        </div>
    </div>
</section>

@stop
