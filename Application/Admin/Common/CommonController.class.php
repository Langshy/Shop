<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 2:46
 */

namespace Admin\Common;


use Think\Controller;

class CommonController extends Controller
{
    public function _initialize(){
        $adminID = $_SESSION['AID'];
        if(empty($adminID) || !isset($adminID)){
            $this->redirect('Login/index');
        }
    }
}