(function () {
    //全局可以host

    var configData = document.global_config_data;
    var version = configData.version;
    requirejs.config({
        baseUrl: configData.resource_root + '/scripts/',
        urlArgs: 'v=' + version,
        waitSeconds: 0,
        paths: {
            //core js
            'jquery': '/bower_components/jquery/dist/jquery.min',
            'zepto': '/bower_components/zepto/zepto.min',
            'swiper': '/bower_components/swiper/dist/js/swiper.min',
            'move': '/bower_components/movejs/move.min',
            'widget': 'widget/widget',
            'string': 'widget/string',
            'base': 'page/base',
        },
        // Use shim for plugins that does not support ADM
        shim: {
            'string': ['jquery'],
            'widget': ['jquery','string'],
            'swiper': ['jquery'],
            'base': ['widget','swiper'],
        }

    });

    var page = configData.page;

    var modules = [];
    if (page) {
        modules.push(page);
    }

    if (modules.length) {
        require(modules, function (modules) {
        });
    }

})();
