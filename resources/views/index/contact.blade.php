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

<section class="sn-contact">
    <div class="wrap text-left">
        <ul class="sn-contact-list">
            <li>
                <div class="info">
                    <p class="title">北京总部</p>
                    <p >地址：北京市海淀区中关村大街甲59号文化大厦1706室</p>
                    <p >电话：010-82503956（总机）</p>
                    <p >传真：010-82503956</p>
                    <p >邮编：100872</p>
                    <p >公司E-mail：sense@sense.com.cn</p>
                </div>
                <div class="img">
                    <img src="/images/maps/1.jpg">
                </div>
            </li>
            <li>
                <div class="info">
                    <p class="title">广东Office</p>
                    <p >地址：广州市天河区华明路39号C1栋505室</p>
                    <p >电话：020-87385571/87385541/87385300</p>
                    <p >传真：020-87385300</p>
                    <p >邮编：510623</p>
                    <p >公司E-mail：sense_gz@sense.com.cn</p>
                </div>
                <div class="img">
                    <img src="/images/maps/2.jpg">
                </div>
            </li>
            <li>
                <div class="info">
                    <p class="title">上海Office</p>
                    <p >地址：上海田林东路100弄11号102室</p>
                    <p >电话：021-64810897/64810597/64810549</p>
                    <p >传真：021-64811921</p>
                    <p >邮编：200235</p>
                    <p >公司E-mail：sense_sh@sense.com.cn</p>
                </div>
                <div class="img">
                    <img src="/images/maps/3.jpg">
                </div>
            </li>
        </ul>
    </div>
</section>


@stop
