<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/8 0008
 * Time: 下午 3:45
 */

namespace Home\Model;


use Think\Template\Driver\Mobile;

class ProductModel extends Mobile
{
    public function getProductisSHOW(){
        $m=M("product");
        $data=$m->where("isShow = '1'")->limit(18)->select();
        return $data;
    }
    public function getProductByID($ID){
        $m=M("product");
        $data=$m->where("TID = '$ID' and isShow = '1'")->limit(18)->select();
        return $data;
    }

    public function getProductID($ID){
        $m=M("product");
        $data=$m->where("PID = '$ID' and isShow = '1'")->find();
        return $data;
    }

    public function getProductRecommend(){
        $data = M('product');
        $result = $data->where("Recommend = '1' and Number >0")->field("PID,TID,Pname,photoAddress,Price")->limit(8)->select();
        return $result;
    }

    public function getProductNameByID($ID){
        $m=M("product");
        $data=$m->where("PID = '$ID'")->field("Pname,Price")->find();
        return $data;
    }

}