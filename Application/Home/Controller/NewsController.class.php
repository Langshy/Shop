<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 下午 3:09
 */

namespace Home\Controller;


use Think\Controller;

class NewsController extends Controller
{
    public function index(){
        $this->display();
    }
}