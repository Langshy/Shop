<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 3:05
 */

namespace Admin\Model;


use Think\Model;

class AdminModel extends Model
{
    public function login($ID,$password){
        $data = M('admin');
        $result = $data->where ("Ausername = '$ID' and Apassword = '$password'")->find ();
        return $result;
    }

    public function  getAllAdminInfo(){
        $data = M('admin');
        $result = $data->field("AID,Ausername,power,photoAddress")->select();
        return $result;
    }
}