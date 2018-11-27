<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/7 0007
 * Time: 下午 7:33
 */

namespace Home\Controller;


use Home\Model\OrderModel;
use Home\Model\ProductModel;
use Home\Model\ShopcartModel;
use Home\Model\UserModel;
use Think\Controller;

class UserController extends Controller
{
    public function index(){
        $userName = I('session.userName');
        $ID = I('session.userID');
        $num = I('session.shopCartNumber');
//        session(null);

        $this->assign('num',$num);
        $this->assign('userName',$userName);
        $this->display();
    }

    public function address(){
        $this->display();
    }

    public function information(){
        $userName = I('session.userName');
        $date = new UserModel();
        $result = $date->getUserInfo($userName);

        $this->assign('result',$result);
        $this->display();
    }

    public function informationChange(){
        $ID = I('session.userID');
        $array['Uname'] = $_POST['name'];
        $array['Sex'] = $_POST['sex'];
        $array['phone'] = $_POST['phone'];
        $array['Email'] = $_POST['mail'];

        $data = new UserModel();
        $data->changeInfo($ID,$array);
        echo json_encode(true);
    }

    public function order(){
        $ID = I('session.userID');
        $data = new OrderModel();
        $productGet = new ProductModel();
        $result = $data->getOrderByID($ID);
        for($i=0;$i<count($result);$i++){
            $p = explode(',',$result[$i]['pids']);
            for($j=0;$j<count($p);$j++){
                $array=explode(':',$p[$j]);
                $getProduct = $productGet->getProductNameByID($array[0]);
                $product['number']=$array[1];
                $product['name']=$getProduct['pname'];
                $product['price']=$getProduct['price'];
                $result[$i]['product'][]=$product;
            }
        }
//        dump($result);
        $this->assign('result' ,$result);
        $this->display();
    }

    public function management(){
        $this->display();
    }

    public function cart(){
        $userName = I('session.userName');
        $ID = I('session.userID');
        $data = new ShopcartModel();
        $num = $data->getCarts($ID);
        $array = $data->getCartInfoByUserID($ID);
//        return;
//        session(null);

        $this->assign('num',$num);
        $this->assign('userName',$userName);
        $this->assign('cart',$array);
        $this->display();
    }

    public function del(){
        $sid = $_POST['sid'];
        $data = new ShopcartModel();
        $result = $data->delAction($sid);

        echo json_encode($result);

    }
}