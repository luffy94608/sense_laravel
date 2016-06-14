<?php

use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datum = [
            [
                'logo' =>'images/partners/1.png',
                'url' =>'http://www.kingdee.gs.cn',
            ],
            [
                'logo' =>'images/partners/2.png',
                'url' =>'http://www.yonyou.com',
            ],
            [
                'logo' =>'images/partners/3.png',
                'url' =>'http://www.siemens.com/entry/cn/zh/',
            ],
            [
                'logo' =>'images/partners/4.png',
                'url' =>'http://www.sony.com.cn',
            ],
            [
                'logo' =>'images/partners/5.png',
                'url' =>'http://www.chanjet.com',
            ],
            [
                'logo' =>'images/partners/6.png',
                'url' =>'http://www.founder.com.cn/zh-cn/',
            ],

        ];
        foreach ($datum as $data) {
            $model = new \App\Models\Partner();
            $model->logo = $data['logo'];
            $model->url = $data['url'];
            $model->save();
        }
    }
}
