<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12 0012
 * Time: 下午 8:55
 */

namespace Home\Model;


use Think\Template\Driver\Mobile;

class OrderModel extends Mobile
{
    public function addOrder($array){
        $data = M('order');
        $result = $data->add($array);
        return $result;
    }

    public function getOrderByID($ID){
        $data = M('order');
        $result = $data->where("ID = '$ID'")->select();
        return $result;
    }

    public function getOrderPrice($oid){
        $data = M('order');
        $result = $data->where("OID = '$oid'")->field("Price")->find();
        return $result;
    }
}