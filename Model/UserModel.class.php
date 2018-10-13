<?php
namespace Model;
use Think\Model;

class UserModel extends Model{
    //一次性获得全部验证错误
     protected $patchValidate    =   true;
    //通过重写父类属性_validate实现表单验证
    protected $_validate        =   array(
       array('username','require','用户名不能为空'),
        array('password','require','密码不能为空'),
        array('password2','require','确认密码不能为空'),
        array('password2','password','与密码的信息必须一致',0,'confirm'),
        array('user_email','email','邮箱格式不正确',2),
        //验证QQ，必须为数字，长度5-11，首位不为0  
        //正则验证  /^[1-9]\d[4,9]$/
        array('user_qq',"/^[1-9]\d[4,9]$/",'qq格式不正确',2),
        array('user_xueli',"2,3,4,5",'必须选择一个学历',0,'in'),
        array('user_hobby','check_hobby','爱好必须两项以上',1,'callback'),
        );  // 自动验证定义
    //自定义方法验证爱好信息
    //$name = $_POST['user_hobby']
    function check_hobby($name){
       if(count($name)<2){
           return false;
       }else{
           return true;
       }
    }
}