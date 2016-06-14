<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $banners = [
            [
                'title' =>'深思安全授权平台',
                'sub_title' =>'助您轻松转变商业模式变客户为用户',
                'img' =>'/images/slides/1.jpg',
                'url' =>'',
                'btn_name' =>'免费注册',
                'btn_url' =>'http://developer.senseshield.com/auth/register.jsp',
            ],
            [
                'title' =>'深思安全授权平台',
                'sub_title' =>'即时授权，提升用户体验，软件保护“零成本”。',
                'img' =>'/images/slides/2.jpg',
                'url' =>'',
                'btn_name' =>'',
                'btn_url' =>'',
            ],
            [
                'title' =>'深思安全授权平台',
                'sub_title' =>'精准掌握所有软件授权的使用情况。',
                'img' =>'/images/slides/3.jpg',
                'url' =>'',
                'btn_name' =>'',
                'btn_url' =>'',
            ],
            [
                'title' =>'深思安全授权平台',
                'sub_title' =>'顶级安全技术，全自动加密引擎，远离盗版。',
                'img' =>'/images/slides/4.jpg',
                'url' =>'',
                'btn_name' =>'',
                'btn_url' =>'',
            ],

        ];
        foreach ($banners as $banner) {
            $bannerModel = new Banner();
            $bannerModel->title = $banner['title'];
            $bannerModel->sub_title = $banner['sub_title'];
            $bannerModel->img = $banner['img'];
            $bannerModel->url = $banner['url'];
            $bannerModel->btn_name = $banner['btn_name'];
            $bannerModel->btn_url = $banner['btn_url'];
            $bannerModel->save();
        }
    }
}
