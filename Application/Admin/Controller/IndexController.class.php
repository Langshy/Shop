<?php
namespace Admin\Controller;


use Admin\Common\CommonController;

class IndexController extends CommonController
{
    public function index(){
        $Aname = I('session.Aname');
        $AID = I('session.AID');

        $this->assign ('AID',$AID);
        $this->assign ('Aname',$Aname);
        $this->display();
    }

    public function main(){
        $this->display();
    }
}