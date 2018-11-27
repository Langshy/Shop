<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 下午 4:14
 */

namespace Home\Model;
use Think\Template\Driver\Mobile;

class UserModel extends Mobile
{
    public function loginAction($ID,$password){
        $data = M('users');
        $result = $data->where("UID='$ID' and Upassword='$password'")->find();
        return $result;
    }

    public function registerAction($array){
        $data = M('users');
        $result = $data->add($array);
        return $result;
    }

    public function isRegister($ID){
        $data = M('users');
        $result = $data->where("UID = '$ID'")->find();
        return $result;
    }

    public function getUserInfo($username){
        $data = M('users');
        $result = $data->where("UID = '$username'")->find();
        return $result;
    }

    public function changeInfo($ID,$array){
        $data = M('users');
        $result = $data->where("ID ='$ID'")->save($array);
        return $result;
    }
}