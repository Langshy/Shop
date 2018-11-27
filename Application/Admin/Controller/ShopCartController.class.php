<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/11/5
 * Time: 16:31
 */

namespace Admin\Controller;


use Admin\Common\CommonController;
use Admin\Model\ShopCartModel;

class ShopCartController extends CommonController
{
    public function index(){
        $result = M('getshopcartinfo')->select();

        $this->assign('cart',$result);

        $this->display();
    }
}