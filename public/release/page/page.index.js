$(document).ready(function(){window.onresize=function(){$(".sn_bxslider>li").css({width:"100%",minWidth:"1024px"})},$(".sn_bxslider").bxSlider({auto:!0,responsive:!0,adaptiveHeight:!0,mode:"fade"}),$(".sn_partners_slide").bxSlider({infiniteLoop:!1,pager:!1,slideWidth:180,minSlides:1,maxSlides:5,slideMargin:10});var t=function(){var t=!1;$(".sn-phcm-list a").unbind().bind("click",function(i){var a=$(this).parents("li").siblings(),e=a.find("img");if(e.length){for(var n=0;n<e.length;n++){var s=a.find("img").eq(n),r=s.data("icon");s.attr("src",r)}var o=$(this).find("img"),d=o.data("active");o.attr("src",d)}if(a.removeClass("active"),$(this).parents("li").removeClass("active").addClass("active"),i&&i.preventDefault?i.preventDefault():window.event.returnValue=!1,i.stopPropagation(),!t){var p=$(".sn_phc_menu").length;if(p>0)for(var c=0;p>c;c++){var f=$(".sn_phc_menu").eq(c);f.attr("data-position",f.offset().top)}t=!0}var l=$(".sn_phc_menu").eq(0),v="#"+l.attr("id"),h=l.attr("data-id");h||(h=v);var m=$(h).offset().top,u=$(this).attr("href"),g=$(u).offset().top,_=parseInt($(h).attr("data-position")),b=parseInt($(u).attr("data-position")),x=g-_,w=m-b;l.attr("data-id",u),$(h).animate({opacity:.5,top:x},function(){$(this).css("opacity",1)}),$(u).animate({opacity:.5,top:w},function(){$(this).css("opacity",1)})})};t(),$(".sn-header").css("position","fixed")});