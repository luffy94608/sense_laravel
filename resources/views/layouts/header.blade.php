<!--公共header-->
<div class="bg-white  sn-header text-left">
    <div class="wrap clear-fix">
        <a href="/"  class="logo_a">
            <div class="logo fl ">
                <img src="/images/logo/logo.png">
                <div class="logo-txt">
                    <img src="/images/logo/t-1.png">
                    <img src="/images/logo/t-2.png">
                    <img src="/images/logo/t-3.png">
                    <img src="/images/logo/t-4.png">
                </div>
            </div>
        </a>
        <div class="menu fl" >
            @if( $menus )
                @foreach($menus as $menu)
                    <div>
                        <a href="@menuUrl({{ $menu }})" target="{{ $menu->target }}" >{{ $menu->name }}</a>
                        {{-- 展开 menu  --}}
                        @if( $menu->show_type == 1 && !empty($menu->children) )
                        <div class="sub-menu-group ">
                            @foreach( $menu->children as $subMenu)
                                <ul class="sub-menu-item clear-fix">
                                    <li class="disabled">
                                        <a class="text-center color-blue" href="" target="{{ $subMenu->target }}" >
                                            {{ $subMenu->name }}
                                        </a>
                                    </li>
                                    @foreach( $subMenu->children as $subItem)
                                        <li>
                                            <a href="platform_intro.html" target="{{ $subItem->target }}" >
                                                <div class="sub-mi-title">{{ $subItem->name }}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                        @endif
                        {{-- 折叠menu --}}
                        @if( $menu->show_type == 0 && !empty($menu->children) )
                        <ul class="sub-menu">
                            @foreach( $menu->children as $subMenu)
                                <li>
                                    <a href="su_platform.html" target="{{ $subMenu->target }}"  >{{ $subMenu->name }}</a>
                                    @if( !empty($subMenu->children) )
                                    <i class="sn-arrow-right"></i>
                                    <ul class="sub-child-menu">
                                        @foreach( $subMenu->children as $subItem)
                                            <li>
                                                <a href="platform_intro.html" target="{{ $subItem->target }}" >
                                                    {{ $subItem->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @endif

                                </li>
                            @endforeach
                        </ul>
                        @endif

                    </div>
                @endforeach
            @endif

            <div class="bg-slide" ></div>
        </div>
        <div class="action fr">
            <a class="sn-login " target="_blank" href="http://developer.senseshield.com/auth/">云帐号登录</a>
        </div>
    </div>
</div>