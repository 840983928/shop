<?php
namespace Model;
use Think\Model;

class LoginModel extends Model{
    protected $_validate = array(
    array('username','require','管理员名称不能为空！',1,'regex',3),
    array('password','require','管理员密码不能为空！',1,'regex',3),
            );
     function login(){
        $password=$this->password;
        $info=$this->where(array('username'=>$this->username))->find();
        if($info){
            if($info['password']==md5($password)){
                session('id',$info['id']);
                session('username',$info['username']);
                return true;
            }else{
                return false;
            }
    }else{
        return false;
   }
    }
}
