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
        <span><a href="{{ $funcTools->menuUrl($locksMenu) }}">{{ $locksMenu->name }}</a></span>
        <span> > </span>
        <span>{{ $detail->type->name }}</span>
        <span> > </span>
        @foreach($locks  as $k=>$lock)
            @if($lock->id == $detail->id)
                <span class="active">{{ $lock->version }}</span>
            @else
                <span><a href="/lock-detail/{{ $lock->id }}?mid={{ $menuInfo->id }}">{{ $lock->version }}</a></span>
            @endif

            @if($k != count($locks)-1)
                <span> | </span>
            @endif
        @endforeach
    </div>
</section>


<!--container list-->
<!--精锐 5 标准版-->
<section class="sn-lock-detail border-bottom-blue">
    <div class="wrap text-left">
        <ul class="sn-nav-tabs ">
            <li class="active">
                <a data-id="#tab_1" href="javascript:void (0);" >产品信息</a>
            </li>
            <li class="">
                <a data-id="#tab_2" href="javascript:void (0);" >技术参数</a>
            </li>
            @if($detail->try_status == 1)
                <li class="">
                    <a data-id="#tab_3" href="javascript:void (0);" >申请试用</a>
                </li>
            @endif
            <li class="">
                <a data-id="#tab_4" href="javascript:void (0);" >SDK下载</a>
            </li>

            @if($detail->shop_url)
                <li class="">
                    <a target="_blank"  href="{{ $detail->shop_url }}" >进入商城</a>
                </li>
            @endif
        </ul>
    </div>
</section>

<section class="sn-lock-detail">
    <div class="wrap text-left">
        <div class="sn-tab-content clear-fix">
            <div id="tab_1" class="sn-tab-pane active">
                <div class="fl sn-ld-pic">
                    <img class="dn-ldp-preview" src="{{ $funcTools->resourceUrl($detail->pic) }}">
                    <div class="dn-ldp-list border-top-grey">
                        <img src="{{ $funcTools->resourceUrl($detail->pic) }}">
                        <img src="{{ $funcTools->resourceUrl($detail->pic) }}">
                        <img src="{{ $funcTools->resourceUrl($detail->pic) }}">
                    </div>
                </div>
                <div class="fr sn-ld-detail">
                    <p class="sn-ld-section-title">产品信息</p>
                    <p class="sn-ld-desc margin-t-20 font-size-16 pre-line">
                        {{ $detail->description }}
                    </p>
                    @if(  !empty($detail->type->name=='精锐5') && !empty($detail->version == '标准版') )
                        <p class="sn-ld-title font-size-18">以下版本可供选择</p>
                        <table class="sn-ld-version">
                            <tr>
                                <th></th><th>旗舰版</th><th>标准版</th><th>基础版</th>
                            </tr>
                            <tr>
                                <td>最大可用存储</td><td>512K</td><td>256K</td><td>128K</td>
                            </tr>
                            <tr>
                                <td>最多授权个数</td><td>6000</td><td>3000</td><td>1500</td>
                            </tr>
                        </table>
                    @endif
                    @if($detail->version == '蓝牙版' && $detail->type->name=='精锐5')
                        <table class="sn-ld-version-c">
                            <tr>
                                <td>
                                    <img width="100%" src="/images/locks/l5_bt_02.png">
                                </td>
                                <td>
                                    <img width="100%" src="/images/locks/l5_bt_03.png">
                                </td>
                            </tr>
                            <tr>
                                <td>CNC金属外壳，钥匙扣外形，与手机充电器、数据线通用，多种颜色可供选择</td>
                                <td>全玉石外壳，印章造型，全无线设计，无任何可见接口</td>
                            </tr>
                        </table>
                        <div class="sn-ld-vc-title">
                            <div>高端商务版</div>
                            <div>VIP定制版</div>
                        </div>
                    @endif
                    @if($detail->version == '标准版' && $detail->type->name=='精锐4S')
                        <table class="sn-ld-version margin-t-100">
                            <tr>
                                <th></th><th>增强版</th><th>标准版</th>
                            </tr>
                            <tr>
                                <td>最大可用存储</td><td>64K</td><td>32K</td>
                            </tr>
                        </table>
                    @endif
                </div>
            </div>
            <div id="tab_2" class="sn-tab-pane ">
                <p class="sn-ld-section-title">{{ $detail->type->name }}具有的特点：</p>
                <p class="sn-ld-feature pre-line">
                    {{ $detail->feature }}
                </p>
                <p class="sn-ld-section-title ">基本参数：</p>

                @if ($detail->params)
                    <table class="sn-ld-params">
                        @foreach($detail->params as $param)
                            @if( $param->param_1 || $param->param_2 || $param->param_3 )
                            <tr>
                                <td width="300">{{ $param->param_1 }}</td>
                                <td>{{ $param->param_2 }}</td>
                                <td width="300">{{ $param->param_3 }}</td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                @endif
            </div>
            @if($detail->try_status == 1)
                <div id="tab_3" class="sn-tab-pane ">
                    <p class="sn-ld-section-title ">基本信息</p>
                    <form class="js_try_buy_form">
                        <div class="clear-fix margin-t-20">
                            <div class="sn-input-inline">
                                <div class="sn-input-group">
                                    <label>姓名：</label>
                                    <input type="text" name="name" placeholder="请填写您的真实姓名">
                                </div>
                            </div>
                            <div class="sn-input-inline">
                                <div class="sn-input-group">
                                    <label>邮箱：</label>
                                    <input type="text" name="email" placeholder="请填写您的真实邮箱">
                                </div>
                            </div>
                            <div class="sn-input-inline">
                                <div class="sn-input-group">
                                    <label>电话：</label>
                                    <input type="text" name="mobile" placeholder="请填写您的有效电话">
                                </div>
                            </div>
                            <div class="sn-input-inline">
                                <div class="sn-input-group">
                                    <label class="width-80">公司名称：</label>
                                    <input type="text" name="company" placeholder="请填写您的公司名称">
                                </div>
                            </div>
                        </div>

                        <p class="sn-ld-section-title margin-t-20">申请试用的产品</p>
                        <p class="margin-t-20">{{$detail->type->name}}-试用版</p>
                        <input type="hidden" name="commodity" value="{{$detail->type->name}}">
                        <p class="sn-ld-section-title margin-t-20">软件的类别</p>
                        <div class="sn-input-group height-45 margin-t-20">
                            <input type="text" name="type" placeholder="请填写您的软件类别，例如：游戏软件">
                        </div>
                        <p class="sn-ld-section-title">您对加密锁的要求</p>
                        <textarea class="sn-ld-textarea" name="desc" rows="10" placeholder="请填写你对加密锁的要求，请如实填写。"></textarea>
                    </form>
                    <div class="sn-ld-btn-list text-center">
                        <button class="sn-ld-btn center js_try_buy_submit_btn">申请试用</button>
                    </div>
                </div>
            @endif
            <div id="tab_4" class="sn-tab-pane ">
                <p class="sn-ld-section-title">相关下载</p>
                <ul>
                    @foreach( $detail->downloads as $download )
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
            </div>
            <div id="tab_5" class="sn-tab-pane ">
            </div>
        </div>
    </div>
</section>


@stop
