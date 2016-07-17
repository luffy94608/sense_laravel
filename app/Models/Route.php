<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    //


    public function getTree($data)
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
            }
        }

        $target->children=$children;
    }
}
