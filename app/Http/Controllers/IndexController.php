<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Jobs\SendReminderEmail;
use App\Models\ApiResult;
use App\Models\Apply;
use App\Models\Banner;
use App\Models\Cert;
use App\Models\Cloud;
use App\Models\CompanyNew;
use App\Models\Download;
use App\Models\Enums\CommonEnum;
use App\Models\Feedback;
use App\Models\Lock;
use App\Models\LockType;
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
        //统计买点
        $this->statPageLog($mid ? $mid : 0);//首页和其他个个页面
        $this->statPageLog('web');//总网站

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
     * 多功能主页
     * @param $type
     * @return mixed
     */
    public function getPage($type)
    {
        switch ($type)
        {
            case 1 ://文件下载
                $page = $this->menuInfo->page;
                $ids = explode(',',$page->extra);
                $downloads = Download::whereIn('id',$ids)->get();
                $types = [];
                $downloadMap = [];
                foreach ($downloads as $download)
                {
                    $types[$download->type->id] = $download->type;
                    $downloadMap[$download->type->id][] = $download;
                }
                foreach ($types as &$type){
                    if(array_key_exists($type->id,$downloadMap)){
                        $type->files = $downloadMap[$type->id];
                    }
                }
                $params = [
                    'types'=>$types,
                    'menuInfo'=>$this->menuInfo,
                ];
                return View::make('index.download_item',$params);
                break;
            case 2 ://文本列表
                $params = [
                    'menuInfo'=>$this->menuInfo,
                ];
                return View::make('index.page_2',$params);
                break;
            case 3 ://图文分离
                $params = [
                    'menuInfo'=>$this->menuInfo,
                ];
                return View::make('index.page_3',$params);
                break;
            case 4 ://图文混和

                $params = [
                    'menuInfo'=>$this->menuInfo,
                ];
                return View::make('index.page_4',$params);
                break;
        }

    }



    /**
     * 加密锁
     * @return \Illuminate\Http\Response
     */
    public function getLocks()
    {
        $subs = Menu::where('parent_id',$this->menuInfo->id)
            ->get();

        $map = [];
        if($subs)
        {
            foreach ($subs as $sub) {
                $page = $sub->page;
                $sid = $page ? $page->extra : '';
                if(!empty($sid)){
                    $map[$sid] = $sub;
                }
            }
        }

        $list = LockType::OrderBy('id','asc')->get();
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
        return View::make('index.locks',$params);
    }

    /**
     * 加密锁详情
     * @param $id
     * @return mixed
     */
    public function getLockDetail($id = '')
    {
        if($id){
            $detail = Lock::where('id',$id)->first();
        }else{
            $page = $this->menuInfo->page;
            $detail = Lock::where('lock_type_id',$page->extra)->first();
        }
        $downloads = [];
        if(!empty($detail->download_ids))
        {
            $ids = explode(',',$detail->download_ids);
            $downloads = Download::whereIn('id',$ids)->get();
        }
        $detail->downloads = $downloads;

        $type = $detail->type;
        $locks = Lock::where('lock_type_id',$type->id)
            ->get();

        $locksMenu = Menu::find($this->menuInfo->parent_id);

        $params = [
            'detail'=>$detail,
            'locks'=>$locks,
            'locksMenu'=>$locksMenu,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.lock_detail',$params);
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
     * 云授权
     * @return \Illuminate\Http\Response
     */
    public function getCloud()
    {
        $clouds = Cloud::OrderBy('sort_num','asc')
            ->get();

        foreach ($clouds as &$cloud){
            $types = [];
            if(!empty($cloud->download_ids) && $cloud->type==1)
            {
                $ids = explode(',',$cloud->download_ids);
                $downloads = Download::whereIn('id',$ids)->get();
                $downloadMap = [];
                foreach ($downloads as $download)
                {
                    $types[$download->type->id] = $download->type;
                    $downloadMap[$download->type->id][] = $download;
                }
                foreach ($types as &$type){
                    if(array_key_exists($type->id,$downloadMap)){
                        $type->files = $downloadMap[$type->id];
                    }
                }

            }
            $cloud->types = $types;
        }

        $params = [
            'clouds'=>$clouds,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.cloud',$params);
    }

    /**
     * 下载中心
     * @return \Illuminate\Http\Response
     */
    public function getDownload()
    {
        $types = LockType::all();

        $params = [
            'types'=>$types,
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.download',$params);
    }

    /**
     * 建议反馈
     * @return \Illuminate\Http\Response
     */
    public function getFeedback()
    {
        $params = [
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.feedback',$params);
    }

    /**
     * 联系我们
     * @return \Illuminate\Http\Response
     */
    public function getContact()
    {
        $params = [
            'menuInfo'=>$this->menuInfo,
        ];
        return View::make('index.contact',$params);
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


    /**
     * 发送提醒的 e-mail 给指定用户。
     */
    public function postFeedback()
    {
        $params['name'] = $_POST['name'] ? $_POST['name'] : false;
        $params['email'] = $_POST['email'] ? $_POST['email'] : false;
        $params['content'] = $_POST['content'] ? $_POST['content'] : false;
        if(!in_array(false,$params,true))
        {

//            $data = ['email'=>'29620639@qq.com', 'name'=>'luffy'];
            $data = ['email'=>'sense@sense.com.cn', 'name'=>'luffy'];
            $data['info'] = $params;
            $feedback = new Feedback();
            $feedback->name = $params['name'];
            $feedback->email = $params['email'];
            $feedback->content = $params['content'];
            $feedback->save();
            \Mail::send('emails.feedback', $data, function($message) use($data)
            {
                $message->to($data['email'], $data['name'])->subject('意见反馈');
            });
        }
        return response()->json((new ApiResult(0, 'success', []))->toJson());
    }

    /**
     * 发送提醒的 e-mail 给指定用户。
     */
    public function postApply()
    {

        $params['name'] = $_POST['name'] ? $_POST['name'] : false;
        $params['mobile'] = $_POST['mobile'] ? $_POST['mobile'] : false;
        $params['email'] = $_POST['email'] ? $_POST['email'] : false;
        $params['company'] = $_POST['company'] ? $_POST['company'] : false;
        $params['commodity'] = $_POST['commodity'] ? $_POST['commodity'] : false;
        $params['type'] = $_POST['type'] ? $_POST['type'] : false;
        $params['desc'] = $_POST['desc'] ? $_POST['desc'] : false;
        if(!in_array(false,$params,true))
        {
            $apply = new Apply();
            $apply->name = $params['name'];
            $apply->mobile = $params['mobile'];
            $apply->email = $params['email'];
            $apply->company = $params['company'];
            $apply->commodity = $params['commodity'];
            $apply->type = $params['type'];
            $apply->desc = $params['desc'];
            $apply->save();

//            $data = ['email'=>'29620639@qq.com', 'name'=>'luffy'];
            $data = ['email'=>'sense@sense.com.cn', 'name'=>'luffy'];
            $data['info'] = $params;
            \Mail::send('emails.apply', $data, function($message) use($data)
            {
                $message->to($data['email'], $data['name'])->subject('申请试用');
            });
        }
        return response()->json((new ApiResult(0, 'success', []))->toJson());
    }

}
