<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/2 0002
 * Time: 下午 2:17
 */

namespace Admin\Controller;


use Admin\Model\AdminModel;
use Think\Controller;

class LoginController extends Controller
{
    public function index(){
        $this->display();
    }

    public function loginAction(){
        $ID = $_POST['ID'];
        $password = md5 ( $_POST['password']);

        $data = new AdminModel();
        $result = $data->login ($ID,$password);

        if($result){
            session ('AID',$result['aid']);
            session ('Aname',$result['ausername']);
            echo json_encode ($result);
        }
    }

    public function loginOut(){
        session (null);
        $this->redirect('Login/index');
    }
}