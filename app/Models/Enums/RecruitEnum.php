<?php

namespace App\Models\Enums;


class RecruitEnum
{

    /**
     * 学历
     */
    const DEGREE     = 0;
    const ORDER_STATUS_ACCEPT           = 1;
    const ORDER_STATUS_ACCOMPLISH       = 2;
    const ORDER_STATUS_REMARKED         = 3;
    const ORDER_STATUS_CLOSE            = 4;

    public static $textMap=array(

        self::ORDER_STATUS_ACCEPT           => '供应商已受理',
        self::ORDER_STATUS_ACCOMPLISH       => '待评价',
        self::ORDER_STATUS_REMARKED         => '已完成',
        self::ORDER_STATUS_CLOSE            => '已关闭',

    );

    public static function getText($type)
    {
        $map=self::$textMap;
        $text=array_key_exists($type,$map)?$map[$type]:'';
        return $text;
    }
}
