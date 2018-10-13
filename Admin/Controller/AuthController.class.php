<?php
namespace Admin\Controller;
use Component\AdminController;
   
class AuthController extends AdminController{
    function showlist(){
      
        $info = $this -> getInfo();
        $this -> assign('info',$info);
        $this -> display();
    }
    function add(){
        if(!empty($_POST)){
            //在AuthModel里边通过一个指定方法实现权限添加
           $auth = new \Model\AuthModel(); 
            $z = $auth -> addAuth($_POST);
            if($z){
                $this -> success('添加权限成功！',U('showlist'));
            }else{
                $this -> error('添加权限失败！',U('showlist'));
            }
        }else{
        //获得父级权限信息
        $info = $this -> getInfo(true);
       // show_bug($info);
        $authinfo = array();
        foreach($info as $v){
            $authinfo[$v['auth_id']] = $v['auth_name'];
        }
        $this -> assign('authinfo',$authinfo);
        $this -> display();
         }
    }
    function getInfo($flag=false){
        //如果$flag 标志为false,查询全部的权限信息
        //如果$flag标志为true，只查询level=0/1de 权限信息
        $goods = D('Auth');
        if($flag == true){
          $info = D('Auth')->where('auth_level<2')->order('auth_path asc')->select();
        }else{
             $info = D('Auth')->order('auth_path asc')->select();
        }
       foreach($info as $k => $v){
           $info[$k]['auth_name'] = str_repeat('->',$v['auth_level']).$info[$k]['auth_name'];
    }
    return $info;
}
}