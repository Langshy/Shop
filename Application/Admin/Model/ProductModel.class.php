<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 4:11
 */

namespace Admin\Model;


use Think\Model;

class ProductModel extends Model
{
    public function addProduct($array){
        $data = M('product');
        $result = $data->add($array);
        return $result;
    }

    public function findProductByName($name){
        $data = M('product');
        $result = $data->where("Pname = '$name'")->find();
        return $result;
    }

    public function getShow($ID){
        $data = M('product');
        $array['isShow']='1';
        $result = $data->where("PID in ($ID)")->save($array);
        return $result;
    }

    public function getProductInfoByID($ID){
        $data = M('product');
        $result = $data->where("PID = $ID")->find();
        return $result;
    }

    public function getBlank($ID){
        $data = M('product');
        $array['isShow']='0';
        $result = $data->where("PID in ($ID)")->save($array);
        return $result;
    }

    public function getRecommend($ID){
        $data = M('product');
        $array['Recommend']='1';
        $result = $data->where("PID in ($ID)")->save($array);
        return $result;
    }

    public function getNoRecommend($ID){
        $data = M('product');
        $array['Recommend']='0';
        $result = $data->where("PID in ($ID)")->save($array);
        return $result;
    }

    public function changeNumber($ID,$number){
        $data = M('product');
        $array['Number']=$number;
        $result = $data->where("PID = $ID")->save($array);
        return $result;
    }

    public function modAction($ID,$array){
        $data = M('product');
        $result = $data->where("PID = $ID")->save($array);
        return $result;
    }

    public function getProductByID($ID){
        $data = M('product');
        $result = $data->where("PID in ($ID)")->field("PID,Pname,Price")->select();
        return $result;
    }
}