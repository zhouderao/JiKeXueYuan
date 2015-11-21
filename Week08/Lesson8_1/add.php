<?php 
	$con = mysql_connect("localhost","root","");

	mysql_query("set names 'utf8'");

  	mysql_select_db("BaiduNews", $con);

  	$tableName = $_POST['name'];

  	$newsTitle = $_POST['title'];

  	$newsImg = $_POST['img'];

  	$addTime =  $_POST['time'];

  	$newContent = $_POST['content'];

  	$sql = "INSERT INTO `".$tableName."` (`newsTitle`, `newsImg`, `newsContent`, `addTime`) VALUES ( ";

  	$sql = $sql."'".$newsTitle."'".","."'".$newsImg."'".","."'".$newContent."'".","."'".$addTime."'".")";
	
	$result = mysql_query($sql,$con);
	
	echo "添加成功";
	
	mysql_close($con);
 ?>