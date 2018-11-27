<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/11/5
 * Time: 19:40
 */

namespace Admin\Controller;


use Admin\Common\CommonController;
use Admin\Model\AdminModel;

class AdminController extends CommonController
{
    public function index(){
        $data = new AdminModel();
        $result = $data->getAllAdminInfo();

        $this->assign('admin',$result);
        $this->display();
    }
}