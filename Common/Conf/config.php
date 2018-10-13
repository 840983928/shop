<?php
return array(
	//'配置项'=>'配置值'
    'UEL_MODEL'  => 1,
    //显示追中日志信息
    'SHOW_PAGE_TRACE' => true,
        'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'shop1',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sw_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'TMPL_ENGINE_TYPE'   => 'Smarty', //修改模板引擎smarty
    
    'LANG_SWITCH_ON'   => true,  //默认关闭语言包功能
    'LANG_AUTO_DETECT'  => true,  //自动侦测语言，开启多语言功能后有效
    'LANG_LIST'     => 'zh-cn,zh-tw,en-us',   //允许切换的语言列表 用逗号分割
    'VAR_LANGUAGE'   => 'hl',      //默认语言切换变量
   
    );