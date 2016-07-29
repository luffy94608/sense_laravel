(function () {
    //全局可以host

    var configData = document.global_config_data;
    var version = configData.version;
    requirejs.config({
        baseUrl: configData.resource_root + '/release/',
        urlArgs: 'v=' + version,
        waitSeconds: 0,
        paths: {
            //core js
            'jquery': '/libs/jquery.min',
            'zepto': '/bower_components/zepto/zepto.min',
            'bxslider-4': '/bower_components/bxslider-4/dist/jquery.bxslider.min',
            'widget': 'widget/widget',
            'string': 'widget/string',
            'base': 'page/base',
            'index': 'page/page.index',
            'page-news-detail': 'page/page.news.detail'
        },
        // Use shim for plugins that does not support ADM
        shim: {
            'string': ['jquery'],
            'widget': ['jquery','string'],
            'bxslider-4': ['jquery'],
            'base': ['jquery'],
            'index': ['base','bxslider-4'],
            'page-news-detail': ['base']
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