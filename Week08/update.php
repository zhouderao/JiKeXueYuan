<?php 
	$con = mysql_connect("localhost","root","");

	mysql_query("set names 'utf8'");

  	mysql_select_db("BaiduNews", $con);

  	$tableName = $_POST['name'];

  	$newsId =   $_POST['id'];

  	$newsTitle = $_POST['title'];

  	$newsImg = $_POST['img'];

  	$addTime =  $_POST['time'];

  	$newContent = $_POST['content'];

  	$sql = "UPDATE `".$tableName."` SET ";

  	if ($newsTitle) {
  		$newsTitle = " `newsTitle`="."'".$newsTitle."'"." ";
  		$sql = $sql.$newsTitle;
  	}

  	if ($newsImg) {
      if ($newsTitle)
  		  $sql = $sql.",";
  		$newsImg = " `newsImg`="."'".$newsImg."'"." ";
  		$sql = $sql.$newsImg;
  	}

  	if ($newContent) {
      if ($newsImg||$newsTitle) 
  		  $sql = $sql.",";
  		$newContent = " `newsContent`="."'".$newContent."'"." ";
  		$sql = $sql.$newContent;
  	}

  	if ($addTime) {
      if ($newContent||$newsImg||$newsTitle)
  		  $sql = $sql.",";
  		$addTime = " `addTime`="."'".$addTime."'"." ";
  		$sql = $sql.$addTime;
  	}

  	if ($sql == "UPDATE `".$tableName."` SET ") {
  		echo "未做修改";
  	}else{
  		$sql = $sql." WHERE newsId=".$newsId;
  		$result = mysql_query($sql,$con);
  		echo "修改成功";
  	}
	 // 关闭数据库连接
	 mysql_close($con);
?>