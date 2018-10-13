<?php
//后台管理员控制器
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller{
    function login(){
        if(!empty($_POST)){
            $verify = new \Think\Verify();
            if(!$verify->check($_POST['captcha'])){
                echo "验证码错误";
            
        }else{
            //判断用户名 密码
            $user = new \Model\ManagerModel();
            $rst = $user -> checkNamePwd($_POST['mg_username'],$_POST['mg_password']);
            if($rst === false){
                echo "用户名或密码错误";
            }else{
                session('mg_username',$rst['mg_name']);
                 session('mg_id',$rst['mg_id']);
                 //页面跳转到后台首页
                // $this->redirect('Index/index',array('id'=>100,'name'=>'admin'),2,'用户马上登陆到后台');
                 $this->redirect('Index/index');
                 }
             }
             }
        $this->assign('lang',L());
        $this->display();
        
    }
    function logout(){
        session(null);
        $this->redirect("Manager/login");
    }
    //验证码
    function verifyImg(){
       $config = array(
         'imageH'    =>  30,               // 验证码图片高度
        'imageW'    =>  100,               // 验证码图片宽度
         'fontSize'  =>  15,              // 验证码字体大小(px)
         'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获
            'length'    =>  4,               // 验证码位数
           );
        $verify = new \Think\Verify($config);
        $verify ->entry();
    }
    function showlist(){
        $info = D('Manager')->select();
        $rinfo = $this ->getRoleInfo();
         $this -> assign('rinfo',$rinfo);
        $this -> assign('info',$info);
        $this->display();
    }
    function upd($mg_id){
        if(!empty($_POST)){
           $manager = D('Manager');
           $manager ->create();
           $z = $manager ->save();
           if($z){
               $this->success('修改管理员成功!',U('showlist'));
           }else{
                 $this->error('修改管理员失败!',U('showlist'));
           }
        }else{
        //获得被修改管理员的信息
        $info = D('Manager')->find($mg_id);
        $rinfo = $this ->getRoleInfo();
         $this -> assign('rinfo',$rinfo);
         $this -> assign('info',$info);
          $this -> assign('mg_id',$mg_id);
          $this -> assign('role_id',$info['mg_role_id']);
        $this -> display();
        }
    }
    function getRoleInfo(){
     //查询全部角色信息
        $rrinfo = D("Role")->select();
        $rinfo = array();
        foreach($rrinfo as $k => $v){
            $rinfo[$v['role_id']] = $v['role_name'];//,array(1=>'经理',2=>'员工'
        }
       
        return $rinfo;
    }
}
