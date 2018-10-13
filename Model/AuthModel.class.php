<?php
    namespace Model;
    use Think\Model;
//权限模型
class AuthModel extends Model{
    //添加权限方法
    function addAuth($auth){
        //$auth 存在4个信息，还缺少2个关键信息 ：auth_path  .auth_level
       //insert生成一个新纪录
        //update 把path,level更新进去
        $new_id = $this -> add($auth);//返回新纪录的主键ID值
        if($auth['auth_pid'] == 0){
            $auth_path = $new_id;
        }else{
            //查询指定父级的全路径$auth['auth_pid']
            $pinfo = $this -> find($auth['auth_pid']);//父级记录信息
            $p_path = $pinfo['auth_path'];//父级全路径
            $auth_path = $p_path."-".$new_id;
            }
            $auth_level = count(explode('-',$auth_path))-1;
        $dt = array(
            'auth_id' => $new_id,
            'auth_path' => $auth_path,
            'auth_level' => $auth_level,
            );
        return $this ->save($dt);
    }
}