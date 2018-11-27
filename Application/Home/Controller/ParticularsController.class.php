<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 下午 3:02
 */

namespace Home\Controller;


use Home\Model\ProductModel;
use Home\Model\ProductTypeModel;
use Home\Model\ShopcartModel;
use Think\Controller;

class ParticularsController extends Controller
{
    public function index(){
        $num = I('session.shopCartNumber');
        $userName = I('session.userName');
        $pid = I('get.pid');
        $tid = I('get.tid');

        $product = new ProductModel();
        $data = new ProductTypeModel();
        $array = $product->getProductID($pid);
        $result = $data->getTypesIsShow();

        $this->assign('product',$array);
        $this->assign('type',$result);
        $this->assign('num',$num);
        $this->assign('tid',$tid);
        $this->assign('userName',$userName);
        $this->display();
    }

    public function addCart(){
        $array['PID'] = $_POST['pid'];
        $array['ID'] = I('session.userID');
        $array['Number'] = $_POST['number'];

        $data = new ShopcartModel();
        //判断用户是否加入过购物车
        $result = $data->getCartinfoByID($array['ID'],$array['PID']);
        if($result){
            $result['number']++;
            $array = $data->addShopNumber($result['sid'],$result['number']);
            echo json_encode($array);
        }else{
            //当不存在的时候
            $result = $data->addShop($array);
            echo json_encode($result);
        }
    }
}