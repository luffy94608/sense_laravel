<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
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
                'name' =>'云授权',
                'url' =>'',
                'parent_id' =>0,
                'children'=>[
                    [
                        'name' =>'云授权平台',
                        'url' =>'',
                        'parent_id' =>0,
                        'children'=>[
                            [
                                'name' =>'了解云授权平台',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                            [
                                'name' =>'云锁服务',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                            [
                                'name' =>'SS安全服务',
                                'url' =>'',
                                'parent_id' =>0,
                            ]
                        ]
                    ],
                    [
                        'name' =>'专业工具',
                        'url' =>'',
                        'parent_id' =>0,
                        'children'=>[
                            [
                                'name' =>'Virbox Protector',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                            [
                                'name' =>'授权管理工具',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                            [
                                'name' =>'用户工具',
                                'url' =>'',
                                'parent_id' =>0,
                            ]
                        ]
                    ],
                    [
                        'name' =>'硬件加密锁',
                        'url' =>'',
                        'parent_id' =>0,
                        'children'=>[
                            [
                                'name' =>'精锐5',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                        ]
                    ]
                ]
            ],
            [
                'name' =>'加密锁',
                'url' =>'',
                'parent_id' =>0,
                'children'=>[
                    [
                        'name' =>'精锐5',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'精锐4S',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'灵锐1',
                        'url' =>'',
                        'parent_id' =>0,
                    ]
                ]
            ],
            [
                'name' =>'资源',
                'url' =>'',
                'parent_id' =>0,
                'children'=>[
                    [
                        'name' =>'云授权',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'解决方案',
                        'url' =>'',
                        'parent_id' =>0,
                        'children'=>[
                            [
                                'name' =>'游戏行业',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                            [
                                'name' =>'管理行业',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                            [
                                'name' =>'建筑行业',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                            [
                                'name' =>'教育和文档',
                                'url' =>'',
                                'parent_id' =>0,
                            ],
                            [
                                'name' =>'通用行业',
                                'url' =>'',
                                'parent_id' =>0,
                            ]
                        ]
                    ],
                    [
                        'name' =>'精锐5',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'精锐4',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'灵锐1',
                        'url' =>'',
                        'parent_id' =>0,
                    ]
                ]
            ],
            [
                'name' =>'我们',
                'url' =>'',
                'parent_id' =>0,
                'children'=>[
                    [
                        'name' =>'公司简介',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'公司新闻',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'成长历程',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'知识产权',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'公司资质',
                        'url' =>'',
                        'parent_id' =>0,
                    ],
                    [
                        'name' =>'诚聘精英',
                        'url' =>'',
                        'parent_id' =>0,
                    ]
                ]
            ],

        ];
        $this->recruitInsert($datum);
    }

    public function recruitInsert($datum, $defaultParentId = 0)
    {
        foreach ($datum as $data) {
            $parentId = $this->insertData($data, $defaultParentId);
            $children = isset($data['children']) ? $data['children'] : [];
            if(count($children)){
                foreach ($children as $child) {
                    $subParentId = $this->insertData($child, $parentId);
                    $subChildren = isset($child['children']) ? $child['children'] : [];
                    if($subChildren){
                        $this->recruitInsert($subChildren, $subParentId);
                    }
                }
            }
        }
    }

    /**
     * 插入单条数据
     * @param $item
     * @param int $parentId
     * @return mixed
     */
    public function insertData($item, $parentId = 0){
        $model = new \App\Models\Menu();
        $model->name = $item['name'];
        $model->url = $item['url'];
        $model->parent_id = $parentId>0 ? $parentId : $item['parent_id'];
        $model->save();

        return $model->id;
    }
}
