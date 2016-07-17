<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Banner;
use App\Models\CompanyNew;
use App\Models\PageContent;
use App\Models\Partner;
use App\Models\Recruit;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function __construct()
    {
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
        $news = CompanyNew::all();
        $params = [
            'news'=>$news,
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
        $news = CompanyNew::where('id',$id)->first();
        $params = [
            'news'=>$news,
        ];
        return View::make('index.news_detail',$params);
    }

    /**
     * 招聘
     * @return mixed
     */
    public function getRecruit()
    {
        $list = Recruit::all();
        $params = [
            'list'=>$list,
        ];
        return View::make('index.recruit',$params);
    }


}
