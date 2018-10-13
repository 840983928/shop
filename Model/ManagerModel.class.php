<?php
namespace Model;
use Think\Model;
class ManagerModel extends Model{
    //制作一个方法对用户名和密码验证
    function checkNamePwd($name,$pwd){
        $info = $this -> getByMg_name($name);
        if($info != null){
          if($info['mg_pwd'] != $pwd){
                 return false;
            }else{
                return $info;
            }
        }else{
            return false;
        }
    }
}
