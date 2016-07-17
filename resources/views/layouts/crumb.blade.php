@inject('funcTools', 'App\Tools\FuncTools')

@if($menuInfo)
    <img width="100%" src="{{ $funcTools->resourceUrl($menuInfo->page->banner) }}">
    <!--page bar 所在位置-->
    <section class="sn-page-bar">
        <div class="wrap text-left sn-pb-content">
            <span>您现在的位置：</span>
            {!! $funcTools->toBuildBreadCrumbHtml($menuInfo) !!}
        </div>
    </section>
@endif
