<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/11/5
 * Time: 10:07
 */

namespace Admin\Controller;


use Admin\Common\CommonController;
use Admin\Model\ProductModel;

class InventoryController extends CommonController
{
    public function index(){
        $result = M('getallproducts')->field('PID,Tname,Pname,Number')->select();
//        dump($result);

        $this->assign('invent',$result);
        $this->display();
    }

    public function changeNumber(){
        $ID = $_POST['id'];
        $number = $_POST['number'];

        $data = new ProductModel();
        $result = $data->changeNumber($ID,$number);
        if($result){
            echo true;
        }
    }
}