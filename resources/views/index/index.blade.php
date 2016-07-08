@extends('layouts.default')
{{--@section('title', '')--}}
@section('content')
        <!--轮播图-->
<div class="sn-slide-section">
    <ul class="sn_bxslider">
        <li>
            <div class="sn-swiper-item">
                <div class="wrap text-left">
                    <p>深思安全授权平台</p>
                    <p>助您轻松转变商业模式<br/>变客户为用户</p>
                    <a href="http://developer.senseshield.com/auth/register.jsp" target="_blank" class="reg-btn " >免费注册</a>
                </div>
            </div>
            <img src="images/slides/1.png">
        </li>
        <li>
            <div class="sn-swiper-item">
                <div class="wrap text-left">
                    <p>深思安全授权平台</p>
                    <p>即时授权 提升用户体验<br/> 软件保护“零成本”</p>
                    <a href="http://developer.senseshield.com/auth/register.jsp" target="_blank" class="reg-btn " >免费注册</a>
                </div>
            </div>
            <img src="images/slides/2.png">
        </li>
        <li class="">
            <div class="sn-swiper-item">
                <div class="wrap text-left">
                    <p>深思安全授权平台</p>
                    <p>精准掌握所有软件授权使用情况 </p>
                    <a href="http://developer.senseshield.com/auth/register.jsp" target="_blank" class="reg-btn" >免费注册</a>
                </div>
            </div>
            <img src="images/slides/3.png">
        </li>
        <li class="">
            <div class="sn-swiper-item">
                <div class="wrap text-left">
                    <p>深思安全授权平台</p>
                    <p>顶级安全技术全自动加密引擎 远离盗版</p>
                    <a href="http://developer.senseshield.com/auth/register.jsp" target="_blank" class="reg-btn " >免费注册</a>
                </div>
            </div>
            <img src="images/slides/4.png">
        </li>
    </ul>
</div>

<!--container-->
<section class="sn-phc-menu ">
    <div class="wrap clear-fix ">
        <p class="sn-phcm-title">深思云授权助力软件企业互联网化</p>
        <ul class="sn-phcm-list">
            <li class="active">
                <a href="#sn_phc_menu_1">
                    <img src="images/home/icon_1_active.png">
                    <p>授权管理</p>
                </a>
            </li>
            <li>
                <a href="#sn_phc_menu_2">
                    <img src="images/home/icon_2.png">
                    <p>软件加密</p>
                </a>
            </li>
            <li>
                <a href="#sn_phc_menu_3">
                    <img src="images/home/icon_3.png">
                    <p>统计分析</p>
                </a>
            </li>
            <li>
                <a href="#sn_phc_menu_4">
                    <img src="images/home/icon_4.png">
                    <p>身份认证</p>
                </a>
            </li>
        </ul>
    </div>
</section>

<section  class="sn-phc-item border-bottom-grey">
    <div id="sn_phc_menu_1" class="wrap clear-fix text-left sn_phc_menu">
        <div class="snphc-desc fl">
            <div class="sn-phcd-center">

                <div class="snphc-tag">授权管理</div>
                <div class="snphc-title">依靠行业领先的、安全灵活的授权管理程序，更快发展软件入云业务。</div>
                <div class="snphc-abstract">
                    你所发行的任何软件，用户都可以实现即付即用或全功能的免费试用。通过云授权服务，你发行给用户的软件授权全部都能即时生效。<br>
                    用户可以获得全程无障碍体验。是否选用加密锁，由用户决定，版权保护实现“零”成本。
                </div>
                <div class="snphc-link">
                    <a class="color-orange js_location_url" data-url="about_platform" href="javascript:void(0);">了解更多......</a><br>
                </div>
            </div>
        </div>
        <div class="snphc-img fr">
            <img class="snphc-img" src="images/home/img_1.png">
        </div>
    </div>
</section>

<section class="sn-phc-item border-bottom-grey">
    <div id="sn_phc_menu_2"  class="wrap clear-fix text-left sn_phc_menu">
        <div class="snphc-desc fl">
            <div class="sn-phcd-center">

                <div class="snphc-tag">软件加密</div>
                <div class="snphc-title">在数分钟内，使你的软件获得顶级的加密保护。</div>
                <div class="snphc-abstract">
                    全自动的加密工具，内含世界一流的安全虚拟机引擎。通过深思专有的自动代码移植技术，使你的软件拥有最强大的抗破解能力。
                    不论使用云锁还是硬件加密锁，体验都是一致的，只需要加密一次。
                </div>
                <div class="snphc-link">
                    <a class="color-orange js_location_url" data-url="vp_tools"  href="javascript:void(0);">了解更多......</a><br>
                </div>
            </div>
        </div>
        <div class="snphc-img fr">
            <img class="snphc-img" src="images/home/img_2.png">
        </div>
    </div>
</section>


<section class="sn-phc-item border-bottom-grey">
    <div id="sn_phc_menu_3" class="wrap clear-fix text-left sn_phc_menu">
        <div class="snphc-desc fl">
            <div class="sn-phcd-center">

                <div class="snphc-tag">统计分析</div>
                <div class="snphc-title">准确、即时跟踪软件模块的使用情况， 了解用户使用习惯和偏好。</div>
                <div class="snphc-abstract">
                    云授权跟踪服务，可以准确跟踪你授权的每个软件模块的实际使用情况，包括使用频率、地域等。 所获取的数据仅涉及授权本身，不会触及任何用户的数据。
                    <br>
                    同时，授权的使用信息也是加密的，只有你所在的组织才能查阅。
                </div>
                <div class="snphc-link">
                </div>
            </div>
        </div>
        <div class="snphc-img fr">
            <img class="snphc-img" src="images/home/img_3.jpg">
        </div>
    </div>
</section>

<section class="sn-phc-item border-bottom-grey">
    <div  id="sn_phc_menu_4"  class="wrap clear-fix text-left sn_phc_menu">
        <div class="snphc-desc fl">
            <div class="sn-phcd-center">

                <div class="snphc-tag">身份认证</div>
                <div class="snphc-title">保护用户的云帐号安全。</div>
                <div class="snphc-abstract">
                    每个用户所持有的精锐5加密锁，都可以提供不亚于网上银行安全等级的身份认证能力。因此，你为用户提供的云服务，例如基于云的业务系统，可以利用加密锁原生的身份认证功能，最大程度保护用户帐号的安全性。
                    <br/>
                    每个精锐5出厂时都带有标识唯一身份的密钥和对应的数字证书，你可以直接使用它完成云帐号的身份认证，最大程度简化了身份认证系统的部署难度。
                </div>
                <div class="snphc-link">
                </div>
            </div>
        </div>
        <div class="snphc-img fr">
            <img class="snphc-img" src="images/home/img_4.png">
        </div>
    </div>
</section>



<!--合作伙伴-->
<section class="sn-partners">
    <div class="wrap clear-fix">
        <p class="sm-p-title">我们的合作伙伴</p>
        <div class="sn-partners-slide">
            <ul class="sn_partners_slide">
                <li class=" ">
                    <div class="sn-partners-item">
                        <a href="http://www.kingdee.gs.cn" target="_blank"><img src="images/partners/1.png"></a>
                    </div>
                </li>
                <li class="  ">
                    <div class="sn-partners-item">
                        <a href="http://www.yonyou.com" target="_blank"><img src="images/partners/2.png"></a>
                    </div>
                </li>
                <li class="  ">
                    <div class="sn-partners-item">
                        <a href="http://www.siemens.com/entry/cn/zh/" target="_blank"><img src="images/partners/3.png"></a>
                    </div>
                </li>
                <li class="">
                    <div class="sn-partners-item">
                        <a href="http://www.sony.com.cn" target="_blank"><img src="images/partners/4.png"></a>
                    </div>
                </li>
                <li class="">
                    <div class="sn-partners-item">
                        <a href="http://www.chanjet.com" target="_blank"><img src="images/partners/5.png"></a>
                    </div>
                </li>
                <li class="">
                    <div class="sn-partners-item">
                        <a href="http://www.founder.com.cn/zh-cn/" target="_blank"><img src="images/partners/6.png"></a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</section>

@stop
