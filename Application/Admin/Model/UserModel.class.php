<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/11/5
 * Time: 15:59
 */

namespace Admin\Model;


use Think\Template\Driver\Mobile;

class UserModel extends Mobile
{
    public function  getUserInfo(){
        $data = M('users');
        $result = $data->field("ID,UID,Sex,phone,photoAddress,Email,AddressIDs,CardIDs")->select();
        return $result;
    }
}