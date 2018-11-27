<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 下午 2:38
 */

namespace Home\Controller;


use Home\Model\ProductModel;
use Think\Controller;

class HomeController extends Controller
{
    public function index(){
        $data = new ProductModel();
        $result = $data->getProductRecommend();

        $this->assign('recommend',$result);
        $this->display();
    }
}