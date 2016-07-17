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


    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }

    public function getMenuTree($data)
    {
        $tree = [];
        if(!empty($data))
        {
            $children = [];
            foreach($data as $v)
            {
                if($v->parent_id == 0){
                    $tree[] = $v;
                }else{
                    $children[]=$v;
                }
            }

            foreach($tree as &$item)
            {
                $this->getRecursionChildrenFromParent($children,$item);
            }

        }
        return $tree;
    }

    /**
     * 递归获取子节点
     * @param $childArr
     * @param $target
     * @return bool
     */
    public function getRecursionChildrenFromParent($childArr,&$target)
    {
        if(empty($childArr))
        {
            return false;
        }
        $children=[];
        $id = $target->id;
        $extraArr = [];
        foreach($childArr as $v)
        {
            if($v->parent_id==$id){
                $children[] = $v;
            }else{
                $extraArr[] = $v;
            }
        }

        if(!empty($children))
        {
            foreach ($children as &$child){
                $this->getRecursionChildrenFromParent($extraArr,$child);
                if(count($child->children) == 1 && $child->children[0]->type==2){
                    $child->children = $child->children[0]->children;
                }
            }
        }

        $target->children=$children;
    }


}
