<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 4:26
 */

namespace Admin\Controller;


use Admin\Common\CommonController;
use Admin\Model\ProductypeModel;
use Think\Controller;


class ProductTypeController extends CommonController
{
    public function index(){
        $data = new ProductypeModel();
        $result = $data->getAllTypes();

        $this->assign('type',$result);
        $this->display ();
    }

    public function add(){
        $this->display ();
    }

    public function addAction(){

        $type = $_POST['type'];
        $isshow = $_POST['isshow'];
        $sort = $_POST['sort'];



        $data = new ProductypeModel();
        $result = $data->isType ($type);
        if(!$result){
            $result = $data->addType ($type,$isshow,$sort);
            if($result){
                $array['result']= true;
                echo json_encode ($array);
                return;
            }else{
                $array['result']= false;
                echo json_encode ($array);
                return;
            }
        }else{
            $array['result']= false;
            echo json_encode ($array);
            return;
        }

    }

    public function show(){
        $array = I('get.data');

        $data = new ProductypeModel();
        $result = $data->getShow($array);
        $this->redirect('ProductType/index');
    }

    public function blank(){
        $array = I('get.data');

        $data = new ProductypeModel();
        $result = $data->getBlank($array);
        $this->redirect('ProductType/index');
    }

    public function del(){
        $array = I('get.data');

        $data = new ProductypeModel();
        $result = $data->delType($array);
        $this->redirect('ProductType/index');
    }

    public function changeSort(){
        $ID = $_POST['tid'];
        $sort = $_POST['sort'];

        $data = new ProductypeModel();
        $result = $data->changeSort($ID,$sort);
        if($result){
            echo true;
        }
    }
}