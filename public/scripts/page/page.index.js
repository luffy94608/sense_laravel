/**
 * Created by luffy on 16/1/28.
 *  当页面ready的时候，执行回调:
 */
$(document).ready(function () {
    $('.sn_bxslider').bxSlider({
        auto: true,
        mode: 'fade'
    });
    $('.sn_partners_slide').bxSlider({
        infiniteLoop: false,
        pager : false,
        slideWidth: 180,
        minSlides: 1,
        maxSlides: 5,
        slideMargin: 10
    });
});