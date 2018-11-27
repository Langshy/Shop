<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/11/5
 * Time: 16:56
 */

namespace Admin\Controller;


use Admin\Common\CommonController;
use Admin\Model\OrderModel;
use Admin\Model\ProductModel;

class OrderController extends CommonController
{
    public function index(){
        $data = new OrderModel();
        $result = $data->getOrderInfo();

        $this->assign('order',$result);
        $this->display();
    }

    public function part(){
        $ID = I('get.id');

        $data = new OrderModel();
        $array = $data->getOrderInfoByID($ID);
        $p = explode(',',$array['pids']);
        for($i=0;$i<count($p);$i++){
            $product[$i]=explode(':',$p[$i]);
        }
        for($i=0;$i<count($product);$i++){
            $IDs[$i]=$product[$i][0];
        }
        $ID = implode(',',$IDs);
        $data=new ProductModel();
        $result = $data->getProductByID($ID);
        for($i=0;$i<count($product);$i++){
            for($j=0;$j<count($result);$j++){
                if($product[$i][0]==$result[$j]['pid']){
                    $result[$j]['number']=$product[$j][1];
                    $result[$j]['price']=$product[$j][2];
                }
            }
        }
        $this->assign('order',$array);
        $this->assign('product',$result);
        $this->display();
    }
}