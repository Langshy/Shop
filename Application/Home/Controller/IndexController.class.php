<?php
namespace Home\Controller;
use Home\Model\ShopcartModel;
use Home\Model\UserModel;
use Qcloud\Sms\SmsSingleSender;
use Think\Controller;
vendor('Qcloudsms.index','','.php');

class IndexController extends Controller {

    public function index(){
        $id = I('get.id');
        $userName = I('session.userName');
        $num = I('session.shopCartNumber');
//        session(null);

        $this->assign('id',$id);
        $this->assign('num',$num);
        $this->assign('userName',$userName);
        $this->display();
    }

    public function login(){
        $userID = I('post.userName');
        $password = md5(I('post.password'));

        $data = new UserModel();
        $result = $data->loginAction($userID,$password);
        if($result){
            $data = new ShopcartModel();
            $num = $data->getCarts($result['id']);

            session("userID",$result['id']);
            session("shopCartNumber",$num);
            session("userName",$userID);
            $this->redirect('Index/index');
        }
    }

    public function loginOut(){
        session(null);
        $this->redirect('Index/index');
    }

    public function register(){
        $user['UID'] = I('post.userName');
        $user['Upassword'] = md5(I('post.password'));
        $user['phone'] = I('post.phone');
        //验证码验证
        $code = I('post.vecode');
        $getCode = I('session.code');
        //判断验证码
        if($code == $getCode){
            $data = new UserModel();
            //判断是否重名
            if(!$data->isRegister($user['UID'])){
                $result = $data->registerAction($user);
                if($result){
                    $data = new ShopcartModel();
                    $num = $data->getCarts($result);

                    session("userID",$result['id']);
                    session("shopCartNumber",$num);
                    session("userName",$user['UID']);
                    $this->success('注册成功！',U('Home/Index/index'));
                }else{
                    $this->error('账号已存在，请重输！');
                }
            }
        }else{
            $this->error('验证码错误，查证后重输！');
        }

    }

    public function code(){
        $phone = $_POST['phone'];

        // $appid $appkey $templateId $smsSign为官方demo所带，请修改为你自己的
        // 短信应用SDK AppID
        $appid = 1400160885;
        // 短信应用SDK AppKey
        $appkey = "4ae5fe3f82d46e9bc85e829c19465c7a";
        // 你的手机号码。
        $phoneNumber = $phone;
        // 短信模板ID，需要在短信应用中申请
        $templateId = 227196;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请
        // 签名
        $smsSign = "CRQ我的世界"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`
        // 单发短信
        try {
            $ssender = new SmsSingleSender($appid, $appkey);
            $code = '654321';
            session('code',$code);
            $params = [$code];
            $result = $ssender->sendWithParam("86", $phoneNumber, $templateId,
                $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
            $rsp = json_decode($result);
            echo $result;
        } catch(\Exception $e) {
            echo var_dump($e);
        }
    }
}