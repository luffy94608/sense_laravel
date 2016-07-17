<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Banner;
use App\Models\CompanyNew;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\Partner;
use App\Models\Recruit;
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
