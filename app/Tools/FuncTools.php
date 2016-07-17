<?php

namespace App\Tools;


use App\Models\Menu;
use PhpSpec\Listener\MethodReturnedNullListener;

class FuncTools
{


    /**
     * 获取菜单跳转链接
     * @param $item
     * @return mixed
     */
    public  function menuUrl($item)
    {
        $url = '';
        if(!is_null($item))
        {
            if( $item->btn_type == 1 ) {
                $page = $item->page;
                $type = $page->type;
                $url = sprintf('%s?mid=%s',$type->url,$item->id);
            } else {
                $url = $item->url;
            }
        }
        return $url;
    }

    /**
     * 获取菜单跳转链接
     * @param $url
     * @return mixed
     */
    public  function resourceUrl($url)
    {
        if(stripos($url,'http://')===false && stripos($url,'https://')===false && stripos($url,'ftp://')===false){
            $host = \Config::get('app')['img_host'];
            $url = $host.$url;
        }
        return $url;
    }

    /**
     *获取面包屑
     * @param MethodReturnedNullListener $menu
     * @param $type //false 展示全部 true 只展示当前
     * @param $clickStatus //false 当前不可点击 true 当前可点击
     * @return string
     */
    public function toBuildBreadCrumbHtml($menu,$type=false,$clickStatus = false)
    {
        $html = "";
        if($menu)
        {
            $parent = Menu::find($menu->parent_id);
            if(!empty($parent) || $menu->parent_id == 0){
                $tmpName = $menu->name;
                return  "
                   <span class='active'>
                        {$tmpName}
                    </span>   

                ";
            }

            $url = $this->menuUrl($parent);

            $tmpName = $parent->name;
            if(!empty($url)){
                $tmpName = sprintf('<a href=\"%s\">%s</a>',$url,$tmpName);
            }
            $html .= "
                   <span>
                        {$tmpName}
                    </span>   
                    <span>></span>

                ";
            $subs = Menu::where('parent_id',$parent->id)
                    ->get();
            $subHtmlArr = [];
            if( $subs && count($subs) ){
                foreach ($subs as $sub) {
                    $tmpName = $sub->name;
                    $url = $this->menuUrl($sub);
                    $active = '';
                    if($sub->id == $menu->id){
                        $active='active';
                    }else{
                        if($type){
                            continue;
                        }
                    }
                    if(!empty($url) && (empty($active) || $clickStatus)){
                        $tmpName = sprintf('<a href="%s">%s</a>',$url,$tmpName);
                    }

                    $subHtmlArr []= "
                    <span class='{$active}'>
                        {$tmpName}
                    </span>
                    ";
                }
                $html .= implode('<span>|</span>',$subHtmlArr);
            }
        }
        return $html;
    }
}
