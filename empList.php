<html>
    <head>
        <meta http-equiv="content-type" content="txet/html" charset="utf-8"/>
        <title>雇员信息列表</title>
        <script type="text/javascript">
       <!--     
            function confirmDele(val){
             return window.confirm("是否要删除id="+val+"的用户");
          }
          //-->
            </script>
    </head>
<?php

        require_once 'EmpService.class.php';
        require_once 'FenyePage.class.php';
        //先看看用户是要分页还是删除某个雇员
        
        //创建了EmpService对象实例
   $empService=new EmpService();
        if(!empty($_GET['flag'])){
            //这是我们知道要删除用户
            $id=$_GET['id'];
            //echo "你希望删除的用户id=$id";
            $empService->delEmpById($id);
        }
        
        
        //创建一个FenyPage对象实例
        $fenyePage=new FenyePage();
        //给fenyePage指定必须的数据
        $fenyePage->pageNow=1;
        $fenyePage->pageSize=6;
        
   
    //这里我们需要判断是否又这个pageNow发送，有就使用。
    //如果没有，则默认显示第一页
    
    if (!empty($_GET['pageNow'])) {
        $fenyePage->pageNow=$_GET['pageNow'];
    }
    
   //调用getFenyePage方法，
   $empService->getFenyePage($fenyePage);
    
    echo "<table border='1px' bordercolor='green' cellspacing='0px' width='700px'>";
    echo "<tr><th>id</th><th>name</th><th>grade</th><th>emali</th>"
    . "<th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
        //这里我们需要循环的显示用户的信息
        //现在我们需要通过数组取.
    
   
       for($i=0;$i<count($fenyePage->res_array);$i++){
           $row=$fenyePage->res_array[$i];
           echo "<tr><td>{$row['id']}</td> <td>{$row['name']}"
                . "</td><td>{$row['grade']}</td><td>{$row['emali']}"
                . "</td><td>{$row['salary']}</td><td><a onclick='return confirmDele({$row['id']})' href='empList.php?flag=del&id={$row['id']}'>删除用户</a></td>"
                . "<td><a href='#'>修改用户</a></td></tr>";
       }
    echo "<h1>雇员信息列表</h1>";
    echo "</table>";
    
    //显示上一页和下一页
    echo $fenyePage->navigate;
    //可以使用for打印超链接
    
    //整体每10页向前翻动
   /*  $page_whole=10;
    $start=floor(($pageNow-1)/$page_whole)*$page_whole+1;
    $index=$start;
    //如果当前pageNow在1-10页数，就没有向前翻动的超链接
    if($pageNow>$page_whole){  
    echo "<a href='empList.php?pageNow=".($start-1)."'><<</a>";
    }
    //定$start 1-》10 floor((pageNow-1)/10)=0*10+1 
    //11-》20 floor((pageNow-1)/10)=1*10+1
    //21->30  floor((pageNow-1)/10)=2*10+1
    for(;$start<$index+$page_whole;$start++){
        echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
        
    }
    //整体每十页翻动
    echo "&nbsp;<a href='empList.php?pageNow=$start'>>></a>&nbsp;&nbsp;";
    
   
    
    //显示当前页和共有多少页
     echo "当前页{$pageNow}/共有{$pageCount}页";
     //指定跳转到某页
     echo "<br/><br/>";*/
     ?>
     
    <form action="empList.php">
             跳转到：<input type="text" name="pageNow"/>
             <input type="submit" value="GO">
             </form>
  
</html>
