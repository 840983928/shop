<?php
namespace Admin\Controller;
use Component\AdminController;
//后台商品控制
class GoodsController extends AdminController{
    //商品列表展示
    function showlist(){
         $goods = D("Goods");
        //1,获得当前记录总条数
        $total = $goods ->count();
        $per = 5;
        //2,实例化分页类对象
           $page = new \Component\Page($total,$per);
           //3.拼装sql语句获得每页信息
         $sql = "select * from sw_goods ".$page -> limit;
           $info =$goods->query($sql);
           //4.获得页码列表
           $pagelist = $page ->fpage();
      //  $goods = new \Model\GoodsModel();
      //  show_bug($goods);
       // var_dump($goods);
     //   $qq = new \Model\QqModel();
      //  show_bug($qq);
      //  $goods = M('User'); 
        //$info = $goods -> where("goods_price > 1000 and goods_name like '索%'")->select();
      //  show_bug($info);
       // foreach ($info as $k => $v){
          //  echo $V['goods_name']."<br/>";
        $this -> assign('info',$info);
        $this -> assign('pagelist',$pagelist);
        $this -> display();
    }
    //添加商品
    function add(){
       /* $goods = D("Goods");
        $ar = array(
            'goods_name'=>'iphone5S',
            'goods_price'=>4999,
            'goods_number'=>53,
        );
        $rst = $goods->add($ar);
        show_bug($rst);*/
        $goods = D("Goods");
        if(!empty($_POST)){
          /*  $goods ->goods_name = $_POST['goods_name'];
             $goods ->goods_price = $_POST['goods_price'];
              $goods ->goods_number = $_POST['goods_number'];
               $goods ->goods_weight = $_POST['goods_weight'];
                $goods ->goods_introduce = $_POST['goods_introduce'];*/
           //判断附件是否有上传
            if(!empty($_FILES)){
                $config = array(
                    'rootPath' => './public/',//根目录
                    'savePath' => 'upload/',//保存路径
                );
               $upload = new \Think\Upload($config);
               $z = $upload -> uploadOne($_FILES['goods_img']);
               if(!$z){
                   show_bug($upload -> getError());
               }else{
                  $bigimg = $z['savepath'].$z['savename'];
                  $_POST['goods_big_img'] = $bigimg;
               //制作缩略图
              $image = new \Think\Image();
              $srcimg = $upload->rootPath.$bigimg;
              $image -> open($srcimg);
              $image -> thumb(150,150);
              $smalling = $z['savepath']."small_".$z['savename'];
              $image -> save($upload->rootPath.$smalling);
              $_POST['goods_small_img'] = $smallimg;
               }
            }
            $goods -> create();
            $z = $goods ->add();
            if($z){
                echo "成功";
            }else{
                echo "失败";
            }
        }else{
         $this->display();
    }
    }
    //修改商品
    function upd($goods_id){
      /*  $goods = D("Goods");
        $ar = array(        
            'goods_name'=>'黑莓手机',
            'goods_price' => 2300
        );
        $rst = $goods->where('goods_id>56') ->save($ar);*/
        $goods = D("Goods");
        //展示表单，收集表单
        if(!empty($_POST)){
          $goods ->create();
          $rst = $goods ->save();
          if($rst){
              echo "成功";
          }else{
              echo "失败";
          }
        }else{
        $info =$goods->find($goods_id);
        $this->assign('info',$info);
         $this->display();
    }
    }
    function del(){
        $goods = D('Goods');
        $rst = $goods ->delete(56);
        $rst = $goods ->where('goods_id>56')->delete();
    }
    //设置缓存
    function s1(){
        S('name','tom',10);
        echo "success";
    }
    //读取缓存数据
    function s2(){
        echo S('name');
    }
    //删除缓存
    function s3(){
        S('name',null);
        echo "delete";
    }
    //外部访问方法
    function y1(){
        show_bug($this -> y2());
    }
    function y2(){
        $info = S('goods_info');
        if($info){
            return $info;
        }else{
            $dt = "iPhonex".time();
            S('goods_info',$dt,10);
            return $dt;
        }
    }
}