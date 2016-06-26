<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function __construct()
    {
    }

    /**
     * 成功页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        
        $params = [
            'page' =>'index'
        ];
        return View::make('index.index',$params);
    }


}
