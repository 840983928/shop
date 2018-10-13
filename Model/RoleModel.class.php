<?php
namespace Model;
use Think\Model;
class RoleModel extends Model{
    //权限分配
    function saveAuth($auth,$role_id){
        $auth_ids = implode(',', $auth);
        $info = D('Auth')->select($auth_ids);
       //拼装控制器和方法
        $auth_ac ='';
        foreach($info as $k => $v){
            if(!empty($v['auth_c']) && !empty($v['auth_a'])){
            $auth_ac .= $v['auth_c']."-".$v['auth_a'].",";
        }
        }
        $auth_ac = rtrim($auth_ac,',');//删除最右边的逗号
        $dt = array(
            'role_id' => $role_id,
            'role_auth_ids'=>$auth_ids,
            'role_auth_ac'=>$auth_ac,
        );
        return $this->save($dt);
    }
}