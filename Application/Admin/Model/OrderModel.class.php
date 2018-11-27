<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/11/5
 * Time: 17:04
 */

namespace Admin\Model;


use Think\Model;

class OrderModel extends Model
{
    public function getOrderInfo(){
        $data = M('order');
        $result = $data->field("OID,PIDs,name,phone,AddressID,Price,ordertime,disposetime,isPay,isDispose")->select();
        return $result;
    }

    public function getOrderInfoByID($ID){
        $data = M('order');
        $result = $data->where("OID=$ID")->find();
        return $result;
    }
}