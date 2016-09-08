/**
 * Created by luffy on 16/5/28.
 */
$(document).ready(function () {
    var initPage = {
        /**
         * 获取url参数
         * @param name
         * @returns {null}
         */
        getParams :function(name) {
            var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if(r!=null)return  unescape(r[2]); return null;
        },
        /**
         * 初始化menu slide
         */
        initMenuSlide : function () {
            var opts = {
                menuItemSlideNode:$('.sn-header .menu .bg-slide'),
                menuItemNode : $('.sn-header .menu>div'),
                menuItemSlideNodeStr:'.sn-header .menu .bg-slide',
                menuItemNodeStr : '.sn-header .menu>div'
            };
            $(opts.menuItemNodeStr).unbind('mouseenter').bind('mouseenter',function () {
                var left = $(this).offset().left;
                $('.sub-menu,.sub-menu-group',$(this)).addClass('active');
                if($(this).html()){
                    opts.menuItemSlideNode.stop().animate({'left':left},'fast');
                }
            });
            $(opts.menuItemNodeStr).unbind('mouseleave').bind('mouseleave',function () {
                $('.sub-menu,.sub-menu-group',$(this)).removeClass('active');
                opts.menuItemSlideNode.stop().animate({'left':'-115px'},'fast');
            });
            $('.sub-menu>li').unbind('mouseenter').bind('mouseenter',function () {
                $('.sub-child-menu',$(this)).addClass('active');
            });
            $('.sub-menu>li').unbind('mouseleave').bind('mouseleave',function () {
                $('.sub-child-menu',$(this)).removeClass('active');
            });
        },
        /**
         * 初始化网站地图 右移动动画
         */
        initSiteMapAnimation:function () {
            var opts = {
                target:'.sn-sm-item .info,.snphc-link>a,.animate_hover_move',
                left:'15px'
            };
            $(document).on('mouseover',opts.target,function () {
                var $this = $(this);
                $this.stop().animate({'left':opts.left});
            });
            $(document).on('mouseout',opts.target,function () {
                var $this = $(this);
                $this.stop().animate({'left':'0'});
            });
        },
        /**
         * 初始化tab切换
         */
        initTabChangeEvent:function () {
            var opts = {
                target:$('.sn-nav-tabs>li'),
                targetCon:$('.sn-tab-content>div')
            };
            opts.target.find('a').click(function () {
                var $this = $(this);
                var id=$this.data('id');
                if(id){
                    opts.target.removeClass('active');
                    $this.parents('li').addClass('active');
                    opts.targetCon.removeClass('active');
                    $(id).addClass('active');
                }
            });
            var tab = initPage.getParams('tab');
            if(tab>0) {
                opts.target.removeClass('active');
                var obj = opts.target.eq(tab);
                var tmpId = obj.find('a').data('id');
                obj.addClass('active');
                opts.targetCon.removeClass('active');
                $(tmpId).addClass('active');
            }
        },
        /**
         * 初始化诚聘精英 列表伸缩效果
         */
        initRecruitLiEvent:function () {
            var opts = {
                target:$('.sn-wr-list>li'),
                targetCon:'.sn-wrl-desc'
            };
            opts.target.unbind().bind('click',function () {
                var $this = $(this);
                if($(opts.targetCon,$this).html()==0){
                    return false;
                }
                var siblingsLis  = $this.siblings();
                siblingsLis.removeClass('active');
                siblingsLis.find(opts.targetCon).slideUp();

                if($this.hasClass('active')){
                    $(opts.targetCon,$this).slideUp();
                    $this.removeClass('active');
                }else{
                    $(opts.targetCon,$this).slideDown();
                    $this.addClass('active');
                }
            });

        },
        /**
         * 初始化企业营销qq
         */
        initQQ : function () {
            setTimeout(function(){
                BizQQWPA.addCustom({aty: '0', a: '0', nameAccount: 4006506701, selector: 'BizQQWPA3'});
                BizQQWPA.addCustom({aty: '0', a: '0', nameAccount: 4006506701, selector: 'BizQQWPA2'});
                BizQQWPA.addCustom({aty: '0', a: '0', nameAccount: 4006506701, selector: 'BizQQWPA'});
            },3000);
        },

        /**
         * 返回顶部
         */
        initScrollTop :function () {
            var oTop = document.getElementById("sn_go_top");
            if(!oTop){
                return false;
            }
            var screenw = document.documentElement.clientWidth || document.body.clientWidth;
            var screenh = document.documentElement.clientHeight || document.body.clientHeight;
            oTop.style.left = screenw - oTop.offsetWidth +"px";
            oTop.style.top = screenh - oTop.offsetHeight + "px";
            window.onscroll = function(){
                var scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
                oTop.style.top = screenh - oTop.offsetHeight + scrolltop +"px";
            };
            oTop.onclick = function(){
                document.documentElement.scrollTop = document.body.scrollTop =0;
            };

        },
        /**
         * 修正 sn-phc-item 高度
         */
        initFixedSnPhcItemHeight :function () {
            var height = $('.sn-phc-item .sn-phcd-center').height();
            var halfHeight = '-'+parseInt(height/2)+'px';
            var style = {
                height: height,
                marginTop:halfHeight
            };
            $('.sn-phc-item .snphc-desc').height(height);
            $('.sn-phc-item .snphc-desc .sn-phcd-center').css(style);
            $('.loading-section').addClass('active');
        },

        /**
         *首页menu 浮动
         */
        initHomeFixed:function () {
            var url = window.location.href;
            if(url.indexOf('index.html')===-1){
                $('.sn-header').css('position','relative');
            }else{
                $('.sn-header').css('position','fixed');
            }
        },
        /**
         * 表格颜色间隔
         */
        initTableGapColor: function () {
            $(".sn-ld-params tr:nth-child(odd)").addClass("odd");
        },
        initTryAndBuyEvent: function () {
            $('.js_try_buy_submit_btn').unbind().bind('click',function () {
                var obj = $(".js_try_buy_form");
                var params = {
                    name:$.trim($('input[name=name]',obj).val()),
                    email:$.trim($('input[name=email]',obj).val()),
                    mobile:$.trim($('input[name=mobile]',obj).val()),
                    company:$.trim($('input[name=company]',obj).val()),
                    type:$.trim($('input[name=type]',obj).val()),
                    commodity:$.trim($('input[name=commodity]',obj).val()),
                    desc:$.trim($('textarea[name=desc]',obj).val())
                };
                if(!params.name){
                    alert('请输入姓名');
                    return false;
                }
                if(!params.email){
                    alert('请输入邮箱');
                    return false;
                }
                if(!params.mobile){
                    alert('请输入电话');
                    return false;
                }
                if(!params.company){
                    alert('请输入公司名称');
                    return false;
                }
                if(!params.type){
                    alert('请输入软件类别');
                    return false;
                }
                if(!params.desc){
                    alert('请输入您对加密锁的要求');
                    return false;
                }
                $.ajax({
                    //提交数据的类型 POST GET
                    type:"POST",
                    //提交的网址
                    url:"/apply",
                    //提交的数据
                    data:params,
                    //返回数据的格式
                    datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
                    //成功返回之后调用的函数
                    success:function(data){
                        alert('申请成功');
                    },
                    //调用出错执行的函数
                    error: function(){
                        //请求出错处理
                        alert('操作失败请稍候再试!');
                    }
                });
            });


        },
        initFeedBackEvent: function () {
            $('.feedback_submit_btn').unbind().bind('click',function () {
                var obj = $(".feedback_form");
                var params = {
                    name:$.trim($('input[name=name]',obj).val()),
                    email:$.trim($('input[name=email]',obj).val()),
                    content:$.trim($('textarea[name=content]',obj).val())
                };
                if(!params.name){
                    alert('请输入姓名');
                    return false;
                }
                if(!params.email){
                    alert('请输入邮箱');
                    return false;
                }
                if(!params.content){
                    alert('请输入留言内容');
                    return false;
                }
                $.ajax({
                    //提交数据的类型 POST GET
                    type:"POST",
                    //提交的网址
                    url:"/feedback",
                    //提交的数据
                    data:params,
                    //返回数据的格式
                    datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
                    //成功返回之后调用的函数
                    success:function(data){
                        alert('反馈成功');
                        $('input[name=name]',obj).val('');
                        $('input[name=email]',obj).val('');
                        $('textarea[name=content]',obj).val('');
                    },
                    //调用出错执行的函数
                    error: function(){
                        //请求出错处理
                        alert('操作失败请稍候再试!');
                    }
                });
            });


        },
        run : function () {
            initPage.initMenuSlide();
            initPage.initSiteMapAnimation();
            initPage.initFixedSnPhcItemHeight();
            initPage.initQQ();
            initPage.initTabChangeEvent();
            initPage.initRecruitLiEvent();
            initPage.initTableGapColor();
            initPage.initHomeFixed();
            initPage.initTryAndBuyEvent();
            initPage.initFeedBackEvent();
            initPage.initScrollTop();
        }
    };

    initPage.run();

});