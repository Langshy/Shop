<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 下午 7:47
 */

namespace Home\Model;



use Think\Template\Driver\Mobile;

class ShopcartModel extends Mobile
{
    public function getCarts($ID){
        $data = M('shopcart');
        $result = $data->where("ID='$ID'")->count();
        return $result;
    }

    public function getCartinfoByID($ID,$pid){
        $data = M('shopcart');
        $result = $data->where("PID=$pid and ID=$ID")->find();
        return $result;
    }

    public function addShop($array){
        $data = M('shopcart');
        $result = $data->add($array);
        return $result;
    }

    public function addShopNumber($sid,$number){
        $data = M('shopcart');
        $array['Number']=$number;
        $result = $data->where("SID = '$sid'")->save($array);
        return $result;
    }

    public function getCartInfoByUserID($ID){
        $data = M("getshopcartinfobyid");
        $result = $data->where("ID = '$ID'")->select();
        return $result;
    }

    public function delAction($ID){
        $data = M('shopcart');
        $result = $data->where("SID in ($ID)")->delete();
        return $result;
    }

    public function getShopInfoByID($ID){
        $data = M('getshopcartinfo');
        $result = $data->where("SID in ($ID)")->select();
        return $result;
    }
}