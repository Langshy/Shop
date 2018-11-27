<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 4:11
 */

namespace Admin\Controller;


use Admin\Common\CommonController;
use Admin\Model\ProductModel;
use Admin\Model\ProductypeModel;
use Think\Upload;

class ProductController extends CommonController
{
    public function index(){
        $result = M('getallproducts')->select ();

        $this->assign('product',$result);
        $this->display ();
    }

    public function add(){
        $data = new ProductypeModel();
        $result = $data->getAllTypes();

        $this->assign('types',$result);
        $this->display();
    }

    public function mod(){
        $ID = I('get.id');

        $type = new ProductypeModel();
        $types = $type->getAllTypes();

        $pro = new ProductModel();
        $result = $pro->getProductInfoByID($ID);
//        dump($result);
//        dump($types);

        $this->assign('type',$types);
        $this->assign('product',$result);
        $this->display();

    }

    public function part(){
        $ID = I('get.id');

        $type = new ProductypeModel();
        $types = $type->getAllTypes();
        $pro = new ProductModel();
        $result = $pro->getProductInfoByID($ID);

        for($i=0;$i<count($types);$i++){
            if($result['tid']==$types[$i]['tid']){
                $result['tname']=$types[$i]['tname'];
            }
        }

        $this->assign('product',$result);
        $this->display();
    }

    public function modAction(){
        $data = new ProductModel();
        $ID = $_POST['pid'];
        $array['TID'] = $_POST['types'];
        $array['Price'] = $_POST['Price'];
        $array['Note'] = $_POST['note'];
        $file = $_FILES['upFile'];
        if($file['error']>0){
            $result = $data->modAction($ID,$array);
            $this->redirect('Product/index');
        }else{
            $img_info = array(
                'maxSize' => 10240000,
                'ext'=>array('jpg','gif','png','jpeg'),
                'saveName'=>'time',
                'autoSub'=>false,
                'rootPath'=>'./Public/Uploads/',
                'savePath'=>'products/'
            );
            $upload = new Upload($img_info);
            $info = $upload->uploadOne($file);

            if($info){
                $name = '/Public/Uploads/'.$img_info['savePath'];
                $array['photoAddress']=$name;
            }else{
                echo $upload->getError();
            }
            $name = '/Public/Uploads/'.$img_info['savePath'].$info['savename'];
            $array['photoAddress']=$name;
            $data->modAction($ID,$array);
            echo json_encode(true);
        }
    }

    public function addProduct(){
        $array['Pname'] = $_POST['name'];
        $array['TID'] = $_POST['types'];
        $array['Price'] = $_POST['Price'];
        $array['Note'] = $_POST['note'];
        $array['isShow'] = $_POST['isShow'];
        $array['Recommend'] = $_POST['Recommend'];
        $file = $_FILES['upFile'];

        $data = new ProductModel();
        //判断商品是否存在
        $result =$data->findProductByName($array['Pname']);
        if($result){
            echo json_encode(false);
            return;
        }
        //图片上传
        $img_info = array(
            'maxSize' => 10240000,
            'ext'=>array('jpg','gif','png','jpeg'),
            'saveName'=>'time',
            'autoSub'=>false,
            'rootPath'=>'./Public/Uploads/',
            'savePath'=>'products/'
        );
        $upload = new Upload($img_info);
        $info = $upload->uploadOne($file);

        if($info){
            $name = '/Public/Uploads/'.$img_info['savePath'];
            $array['photoAddress']=$name;
        }else{
            echo $upload->getError();
        }
        $name ='/Public/Uploads/'.$img_info['savePath'].$info['savename'];
        $array['photoAddress']=$name;



        $data->addProduct($array);
        echo json_encode(true);
    }

    public function productShow(){
        $array = I('get.data');

        $data = new ProductModel();
        $result = $data->getShow($array);
        $this->redirect('Product/index');
    }

    public function productBlank(){
        $array = I('get.data');

        $data = new ProductModel();
        $result = $data->getBlank($array);
        $this->redirect('Product/index');
    }

    public function getRecommend(){
        $array = I('get.data');

        $data = new ProductModel();
        $result = $data->getRecommend($array);
        $this->redirect('Product/index');
    }

    public function getNoRecommend(){
        $array = I('get.data');

        $data = new ProductModel();
        $result = $data->getNoRecommend($array);
        $this->redirect('Product/index');
    }
}