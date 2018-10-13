<?php

namespace Component;
use Think\Controller;
class AdminController extends Controller{
    function __construct(){
        parent::__construct();
         //CONTROLLER_NAME----Goods
       // ACTION_NAME ----showlist
        //当前请求操作
        $now_ac = CONTROLLER_NAME."-".ACTION_NAME;
        //过滤控制器和方法，避免用户非法请求
        $sql ="select role_auth_ac from sw_manager a join sw_role b on a.mg_role_id=b.role_id where a.mg_id=".$_SESSION['mg_id'];
        $auth_ac = D()->query($sql);
        $auth_ac = $auth_ac[0]['role_auth_ac'];
        //判断$now_ac是否在$auth_ac字符串里边有出现过
        //strpos函数如果返回false是没有出现，返回0 1 2 3表现有出现
        //默认一下权限没有限制
        $allow_ac = array('Index-left','Index-right','Index-head','Index-index','Manager-login');
       if(!in_array($now_ac,$allow_ac) && $_SESSION['mg_id'] !=1 && strpos($auth_ac,$now_ac)=== false){
          $this -> error('没有权限访问',U("index/right"));
       }
    }
}