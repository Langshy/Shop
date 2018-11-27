<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 下午 2:47
 */

namespace Home\Controller;


use Home\Model\OrderModel;
use Home\Model\ProductModel;
use Home\Model\ProductTypeModel;
use Home\Model\ShopcartModel;
use Org\Util\Date;
use Think\Controller;

class ShopController extends Controller
{
    public function index(){

        $data = new ProductTypeModel();
        $product = new ProductModel();

        $array = $product->getProductisSHOW();

        $userName = I('session.userName');
        $num = I('session.shopCartNumber');

        $result = $data->getTypesIsShow();


        $this->assign('product',$array);
//        session(null);
        $this->assign('num',$num);
        $this->assign('type',$result);
        $this->assign('userName',$userName);
        $this->display();
    }

    public function part(){
        $num = I('session.shopCartNumber');
        $userName = I('session.userName');
        $id = I('get.id');
        $product = new ProductModel();
        $data = new ProductTypeModel();

        if($id == 'all'){
            $array = $product->getProductisSHOW();
        }else{
            $array = $product->getProductByID($id);
        }
        $result = $data->getTypesIsShow();

        $this->assign('num',$num);
        $this->assign('userName',$userName);
        $this->assign('id',$id);
        $this->assign('product',$array);
        $this->assign('type',$result);
        $this->display();
    }

    public function order(){
        $num = I('session.shopCartNumber');
        $userName = I('session.userName');
        $oid = time();
        $sid = I('get.id');
        $price = I('get.price');

        $data = new ShopcartModel();
        $result = $data->getShopInfoByID($sid);


        $this->assign('product',$result);
        $this->assign('price',$price);
        $this->assign('oid',$oid);
        $this->assign('num',$num);
        $this->assign('userName',$userName);
        $this->display();
    }

    public function addOrder(){
        $array['OID']=$_POST['oid'];
        $array['PIDs']=$_POST['pids'];
        $array['ID']= I('session.userID');
        $array['name']=$_POST['name'];
        $array['phone']=$_POST['phone'];
        $array['AddressID']=$_POST['address'];
        $array['Price']=$_POST['price'];
        $array['ordertime']= date('Y-m-d H:i:s',time());
      	$array['disposetime']='0-0-0 0:0:0';

        $data = new OrderModel();
        $result = $data->addOrder($array);

        echo $result;

    }

    public function paySuccess(){
        $oid = I('get.oid');
        $data = new OrderModel();
        $result = $data->getOrderPrice($oid);

        $this->assign('oid',$oid);
        $this->assign('price',$result['price']);
        $this->display();
    }

    public function payFail(){
        $this->display();
    }
}