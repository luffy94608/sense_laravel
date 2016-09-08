/**
 * Created by luffy on 16/1/28.
 *  当页面ready的时候，执行回调:
 */
$(document).ready(function () {

    window.onresize = function(){
        $('.sn_bxslider>li').css({'width':'100%','minWidth':'1024px'});
    };
    $('.sn_bxslider').bxSlider({
        auto: true,
        responsive: true,
        adaptiveHeight: true,
        onSliderLoad:function (currentIndex) {
            var tmpObj = $('.sn-swiper-item');
            if(tmpObj.css('visibility') == 'hidden'){
                tmpObj.css('visibility','visible');
            }
        },
        mode: 'fade'
    });
    $('.sn_partners_slide').bxSlider({
        infiniteLoop: false,
        pager : false,
        slideWidth: 180,
        minSlides: 1,
        maxSlides: 5,
        slideMargin: 10,
        onSliderLoad:function (currentIndex) {
            $('.sn-partners').css({'visibility':'visible','height':'auto'});
        }
    });

    $('.sn-slide-section').css('height','auto');
    /**
     * 初始化首页列表切换动画
     */
    var initHomeSwitchBtn = function () {
        var status= false;
        $('.sn-phcm-list a').unbind().bind('click',function (e) {
            var othersLi = $(this).parents('li').siblings();
            var imgs = othersLi.find('img');
            if(imgs.length){
                for (var j=0;j<imgs.length;j++){
                    var tmpObj = othersLi.find('img').eq(j);
                    var icon = tmpObj.data('icon');
                    tmpObj.attr('src',icon);

                }
                var currentImgObj = $(this).find('img');
                var currentImg = currentImgObj.data('active');
                currentImgObj.attr('src',currentImg);
            }
            othersLi.removeClass('active');
            $(this).parents('li').removeClass('active').addClass('active');

            if(e && e.preventDefault){
                e.preventDefault();
            }else{
                window.event.returnValue = false;//注意加window
            }
            e.stopPropagation();
            if(!status){
                var len=$('.sn_phc_menu').length;
                if(len>0){
                    for (var i=0;i<len;i++){
                        var tmp=$('.sn_phc_menu').eq(i);
                        tmp.attr('data-position',tmp.offset().top);
                    }
                }
                status= true;
            }
            var initObj = $('.sn_phc_menu').eq(0);
            var initId = '#'+initObj.attr('id');
            var srcId = initObj.attr('data-id');
            if(!srcId){
                srcId = initId;
            }
            var srcPTop = $(srcId).offset().top;
            var id = $(this).attr('href');
            var targetTop = $(id).offset().top;
            var srcPosition= parseInt($(srcId).attr('data-position'));
            var targetPosition= parseInt($(id).attr('data-position'));

            var diffSHeight = targetTop - srcPosition;
            var diffTHeight = srcPTop - targetPosition;
            initObj.attr('data-id',id);
            $(srcId).animate({
                'opacity': 0.5,
                'top': diffSHeight
            },function () {
                $(this).css('opacity',1);
            });

            $(id).animate({
                'opacity': 0.5,
                'top': diffTHeight
            },function () {
                $(this).css('opacity',1);
            });
        });

    };
    initHomeSwitchBtn();
    $('.sn-header').css('position','fixed');
});