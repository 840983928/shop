<?php 
    
    //制作一个输出调试函数
    function show_bug($msg){
        echo "<pre>";
        var_dump($msg);
        echo "</pre>";
    }
    //定义CSS，img,js常量
    define("SITE_URL","http://web.shop.com/shop/");
    define("CSS_URL",SITE_URL."shop/public/Home/css/");
    define("IMG_URL",SITE_URL."shop/public/Home/img/");
      define("JS_URL",SITE_URL."shop/public/Home/js/");
      
    define("ADMIN_CSS_URL",SITE_URL."shop/public/Admin/css/");
    define("ADMIN_IMG_URL",SITE_URL."shop/public/Admin/img/");
      define("ADMIN_JS_URL",SITE_URL."shop/public/Admin/js/");
      //为上传图片设置路径
      define("IMG_UPLOAD",SITE_URL."shop/public/");
define("APP_DEBUG",true);
//引入框架的核心程序
 include "../ThinkPHP/ThinkPHP.php";