<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 下午 5:19
 */

namespace Home\Model;


use Think\Template\Driver\Mobile;

class ProductTypeModel extends Mobile
{
    public function getTypesIsShow(){
        $data = M('productype');
        $result = $data->where("isShow = '1'")->field("TID,Tname")->order('sort')->limit(8)->select();
        return $result;
    }
}