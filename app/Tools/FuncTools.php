<?php

namespace App\Tools;


class FuncTools
{


    /**
     * 获取菜单跳转链接
     * @param $item
     * @return mixed
     */
    public  function menuUrl($item)
    {
        if( $item->btn_type == 1 ) {
            $page = $item->page;
            $type = $page->type;
            if($type->status == 1) {
                $url = sprintf('%s%s',$type->url,$page->id);
            } else {
                $url = $type->url;
            }
        } else {
            $url = $item->url;
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
}
