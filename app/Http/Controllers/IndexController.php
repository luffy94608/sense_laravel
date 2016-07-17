<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Banner;
use App\Models\Cert;
use App\Models\CompanyNew;
use App\Models\Enums\CommonEnum;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\Partner;
use App\Models\Recruit;
use App\Models\Route;
use App\Models\Solution;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public $menuInfo;

    public function __construct()
    {
        $mid = Input::get('mid');
        $menuInfo = '';
        if(!empty($mid)){
            $menuInfo = Menu::find($mid);
        }
        $this->menuInfo = $menuInfo;
    }

    /**
     * 主页页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $banners = Banner::orderBy('sort_num', 'asc')->get();
        $partners = Partner::orderBy('sort_num', 'asc')->get();
        $list = PageContent::where('page_id',0)
            ->OrderBy('sort_num','asc')->get();

        $params = [
            'page' =>'index',
            'banners' =>$banners,
            'partners' =>$partners,
            'list' =>$list,
        ];
        return View::make('index.index',$params);
    }






    /**
     * 解决方案列表
     * @return \Illuminate\Http\Response
     */
    public function getSolution()
    {
        $subs = Menu::where('parent_id',$this->menuInfo->id)
            ->get();

        $map = [];
        if($subs)
        {
            foreach ($subs as $sub) {
                $page = $sub->page;
                $sid = $page->extra;
                if(!empty($sid)){
                    $map[$sid] = $sub;
                }
            }
        }

        $list = Solution::orderBy('sort_num','asc')->get();
        if($list)
        {
            foreach ($list as &$v) {
                if(array_key_exists($v->id,$map)){
                    $v ->menu = $map[$v->id];
                }
            }
        }

        $params = [
            'list'=>$list,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.solution',$params);
    }

    /**
     * 解决方案详情
     * @return \Illuminate\Http\Response
     */
    public function getSolutionDetail()
    {
        $page = $this->menuInfo->page;
        $detail = Solution::find($page->extra);
        $params = [
            'detail'=>$detail,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.solution_detail',$params);
    }

    /**
     * 成长历程
     * @return \Illuminate\Http\Response
     */
    public function getRoute()
    {
        $list = Route::orderBy('sort_num','asc')->get();
        $route = new Route();
        $tree = $route->getTree($list);
        $params = [
            'list'=>$tree,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.route',$params);
    }

    /**
     * 知识产权
     * @return \Illuminate\Http\Response
     */
    public function getIntellectual()
    {
        $list = Cert::where('type',CommonEnum::CertTypeIntellectual)
            ->orderBy('sort_num','asc')
            ->get();
        $params = [
            'list'=>$list,
            'certType'=>CommonEnum::CertTypeIntellectual,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.certs',$params);
    }

    /**
     * 公司资质
     * @return \Illuminate\Http\Response
     */
    public function getProperty()
    {
        $list = Cert::where('type',CommonEnum::CertTypeProperty)
            ->orderBy('sort_num','asc')
            ->get();
        $params = [
            'list'=>$list,
            'certType'=>CommonEnum::CertTypeProperty,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.certs',$params);
    }


    /**
     * 新闻
     *
     * @return \Illuminate\Http\Response
     */
    public function getNews()
    {
        $news = CompanyNew::orderBy('sort_num','asc')->get();
        $params = [
            'news'=>$news,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.news',$params);
    }

    /**
     * 新闻详情
     * @param $id
     * @return mixed
     */
    public function getNewsDetail($id)
    {
        $mid = Input::get('mid');
        $news = CompanyNew::where('id',$id)->first();

        $key = 'id';
        $value = $news->id;
        if($news->sort_num>0){
            $key = 'sort_num';
            $value = $news->sort_num;
        }

        $prev = CompanyNew::where($key,'<',$value)
            ->orderBy($key,'desc')
            ->first();
        $next = CompanyNew::where($key,'>',$value)
            ->orderBy($key,'asc')
            ->first();
        $prevUrl = $nextUrl = 'javascript:void(0)';
        if($prev){
            $prevUrl = sprintf('/news-detail/%s/?mid=%s',$prev->id,$mid);
        }
        if($next){
            $nextUrl = sprintf('/news-detail/%s/?mid=%s',$next->id,$mid);
        }

        $params = [
            'news'=>$news,
            'nextUrl'=>$nextUrl,
            'prevUrl'=>$prevUrl,
            'page'=>'page-news-detail',
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.news_detail',$params);
    }

    /**
     * 招聘
     * @return mixed
     */
    public function getRecruit()
    {
        $list = Recruit::orderBy('sort_num','asc')->get();
        $params = [
            'list'=>$list,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.recruit',$params);
    }


}
