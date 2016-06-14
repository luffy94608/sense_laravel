<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = ['name'];
//
//    /**
//     * Indicates if the model should be timestamped.
//     *
//     * @var bool
//     */
//    public $timestamps = false;

    public function getMenuTree()
    {


    }

    /**
     * 递归获取子节点
     * @param $parent
     * @param $target
     * @return bool
     */
    public function getRecursionChildrenFromParent($parent,&$target)
    {
        
    }


}
