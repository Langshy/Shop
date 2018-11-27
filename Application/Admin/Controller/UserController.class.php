<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/11/5
 * Time: 15:36
 */

namespace Admin\Controller;


use Admin\Common\CommonController;
use Admin\Model\UserModel;

class UserController extends CommonController
{
    public function index(){
        $data = new UserModel();
        $result = $data->getUserInfo();

        $this->assign('userInfo',$result);
        $this->display();
    }
}