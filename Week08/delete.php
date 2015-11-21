<?php 
	$con = mysql_connect("localhost","root","");

	mysql_query("set names 'utf8'");

  	mysql_select_db("BaiduNews", $con);

  	$tableName = $_POST['name'];

  	$newsId = $_POST['id'];


  	$sql = "DELETE FROM `".$tableName."` ";

	$sql = $sql." WHERE newsId=".$newsId;

	$result = mysql_query($sql,$con);

	echo "删除成功";
	// 关闭数据库连接
	mysql_close($con);

 ?>