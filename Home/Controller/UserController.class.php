<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    //用户登录
     function user(){
          $user = new \Model\LoginModel();
            $user=D('user');
        if(IS_POST){
            if($user->create()){
                if($user->login()){
                  $this->success('登录成功！',U('Index/index'));
                }else{
                    $this->error('您的用户名或者密码错误');
                }
        }else{
            $this->error($user->getError());
        }
        return;
    }
        $this->display('login');
             }

   
    //用户注册
     function register(){
      $user = new \Model\UserModel();
        //判断表单是否提交
        if(!empty($_POST)){
          //只有全部通过$z才会为真    
          if(!$user->create()){
              show_bug($user->getError());
               //getError方法返回失败的信息  
          }else{
              //把hobby由数组变为字符串
              $user -> user_hobby = implode(',',$_POST['user_hobby']);
          $rst = $user->add();
          if($rst){
              $this -> success('注册成功',U('Index/index'));
          } else {
           $this -> error('注册失败',U('Index/index'));    
          }
          }
        }else{
    	$this->display();
        }
     }
}