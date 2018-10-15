<?php 
 	$id=$_POST['id'];
 	$name=$_POST['name'];
 	$po=@$_POST['po'];
 	$con = mysql_connect('localhost','root','root');
 	if(!$con){
 		echo '连接失败';
 		exit;
 	}
 	mysql_query("SET NAMES UTF8");  
 	mysql_select_db('db100');
 	$sql = "select * from city where id=$id";

 	$res = mysql_query($sql);
 	echo "<table border='1px' width='400px'>";
	while($row = mysql_fetch_array($res)){
	//	echo '<pre>';
	//	var_dump($row);
	  echo "<tr><td>ID</td><td>城市</td><td>人口</td></tr>";
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['po']}</td></tr>";
	}
	echo "</table>";
?>