<?php

use Illuminate\Database\Seeder;

class CompanyNewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $datum = [
            [
                'title' =>'3.21 新序幕拉开,深思与您不见不散!',
                'time' =>'2016-03-10',
                'content' =>'传统的软件许可证模式将成为过去式 , 将被授权模式所取代。 现茌 , 我们终于能大声的宣布 , 深思将带您进入软件版权保护3.0时代 !
                    作为软件开发商的您 ,
                    是否还茌为互联网商业模式的转变而感到日头疼 ?
                    是否因为传统软件产品交付模式的漫长周期而导致了用户流失 ?
                    是否为了招聘优秀的加密技术人才 , 却屡屡受困于水涨船高的人力资源成本 ?
                    ......
                    您是否期盼着有一天这一切的难题都将迎刃而解 ?
                    现在 , 您所期待的这一天就在眼前 !
                    3目21日 , 访间深思数盾官网 , 深思与您相约开启软件版权保护行业新序幕 ! 届时参与线上有奖活动还有惊喜送给您哦 !
                ',
            ],

        ];
        foreach ($datum as $data) {
            $model = new \App\Models\CompanyNew();
            $model->title = $data['title'];
            $model->time = $data['time'];
            $model->content = $data['content'];
            $model->save();
        }
    }
}
