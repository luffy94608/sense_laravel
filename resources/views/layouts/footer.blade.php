@inject('funcTools', 'App\Tools\FuncTools')
<!--公共 site maps-->
<div class="sn-site-map clear-fix">
    <div class="wrap text-left">
        @if( $maps )
            @foreach( $maps as $map)
                <ul class="sn-sm-item">
                    <li class="title" >
                        @if($funcTools->menuUrl($map))
                            <a  href="{{ $funcTools->menuUrl($map) }}" target="{{ $map->target }}" >{{ $map->name }}</a>
                        @else
                            <a>{{ $map->name }}</a>
                        @endif
                    </li>
                    @foreach( $map->children as $subMapItem)
                        <li>
                            @if($funcTools->menuUrl($subMapItem))
                                <a class="info"  href="{{ $funcTools->menuUrl($subMapItem) }}" target="{{ $subMapItem->target }}" >{{ $subMapItem->name }}</a>
                            @else
                                <a class="info" >
                                    {{ $subMapItem->name }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endforeach
        @endif
        <ul class="sn-sm-item">
            <li class="title js_location_url" data-url="index" >深思数盾</li>
            <li><a id="BizQQWPA2"  class="info"  href="javascript:void(0);"><img src="/images/icons/qq.png">QQ</a></li>
            <li><a class="info js_location_url"   href="javascript:void(0); "><img src="/images/icons/wechat.png">微信</a></li>
            <li><a class="info js_location_url"  href="http://www.senselock.com/en/index.php"><img src="/images/icons/area.png">选择地图</a></li>
        </ul>

        <ul class="sn-sm-item fr">
            <li class="title text-center">扫描关注微信</li>
            <li>
                <img width="138" src="/images/qr-code.jpg">
            </li>
        </ul>
    </div>
</div>

<!--公共footer-->
<div class="sn-footer">
    <div class="wrap clear-fix">
        <div class="fl text-left">
            <p>隐私条款 | 企业邮箱</p>
            <p>北京市海淀区中关村大街甲59号文化大厦1706室</p>
        </div>
        <div class="fr text-right">
            <p></p>
            <p>版权所有 北京深思数盾科技股份有限公司 © 2016 京ICP备16009104号-1</p>
        </div>
    </div>
</div>

<!--公共浮层-->
<div class="sn-fix-menu">
    <div class="mask"></div>
    <a class="qq clear-fix" id='BizQQWPA' href="javascript:void(0);"></a>
    <a class="mobile" href="javascript:void(0);"></a>
    <a class="qr" href="javascript:void(0); ">
        <img src="/images/float_layer/qr.png">
    </a>
    <a id="sn_go_top" class="up" href="javascript:void(0); "></a>
</div>
