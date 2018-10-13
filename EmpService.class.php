<?php
        require_once 'SqlHelper.class.php';
        class EmpService{
            
        
    //一个函数可以获取共有多少页
      function getPageCount($pageSize){
          //需要查询$rowCount
          $sql="select count(id) from emp";
          $sqlHelper=new SqlHelper();
          $res=$sqlHelper->execute_dql($sql);
          //这样就可以计算$pageCount
          if($row=mysql_fetch_row($res)){
              $pageCount=ceil($row['0']/$pageSize);
          }
          //释放资源 关闭连接
          mysql_free_result($res);
          $sqlHelper->close_connect();
          return $pageCount;
      }
      //需要一个函数可以获取应当显示的雇员信息
      function getEmplistByPage($pageNow,$pageSize){
          $sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
       //   var_dump($sql); 
       //   exit;
          $sqlHelper=new SqlHelper();
          //这里的$res 就是一个二维数组
          $res=$sqlHelper->execute_dql2($sql);
          //释放资源和关闭连接
         // mysql_free_result($res);
          $sqlHelper->close_connect();
          return $res;
      }
       //第二种使用封装的方式完成分页(业务逻辑到这里)
      function getFenyePage($fenyePage){
          //创建一个SqlHelper对象实例
          $sqlHelper=new SqlHelper();
          $sql1="select * from emp limit "
                  .($fenyePage->pageNow-1)*$fenyePage->pageSize.","
                  .$fenyePage->pageSize;
          //如何排除错误
         // echo "sql1=$sql1";
       //   exit();
                  $sql2="select count(id) from emp";
          $sqlHelper->exectue_dql_fenye($sql1, $sql2, $fenyePage);
          $sqlHelper->close_connect();
      }
      //根据输入的id删除某个用户
      function delEmpById($id){
          $sql="delete from emp where id=$id";
          //创建SqlHelper实例对象
          $sqlHelper=new SqlHelper();
          $sqlHelper->execute_dml($sql);
      }
      }
?>
