<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 4:52
 */

namespace Admin\Model;


use Think\Model;

class ProductypeModel extends Model
{
    public function isType($type){
        $data = M('productype');
        $result = $data->where ("Tname = '$type'")->find ();
        return $result;
    }

    public function addType($type,$isshow,$sort){
        $data = M('productype');
        $array['Tname']=$type;
        $array['isShow']=$isshow;
        $array['sort']=$sort;
        $result = $data->add ($array);
        return $result;
    }

    public function getAllTypes(){
        $data = M('productype');
        $result = $data->order('sort')->select();
        return $result;
    }

    public function getShow($ID){
        $data = M('productype');
        $array['isShow']='1';
        $result = $data->where("TID in ($ID)")->save($array);
        return $result;
    }

    public function getBlank($ID){
        $data = M('productype');
        $array['isShow']='0';
        $result = $data->where("TID in ($ID)")->save($array);
        return $result;
    }

    public function delType($ID){
        $data = M('productype');
        $result = $data->where("TID in ($ID)")->delete();
        return $result;
    }


    public function changeSort($ID,$sort){
        $data = M('productype');
        $array['sort']=$sort;
        $result = $data->where("TID = $ID")->save($array);
        return $result;
    }
}