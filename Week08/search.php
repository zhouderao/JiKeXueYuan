<?php 
	include('news.php');

	$con = mysql_connect("localhost","root","");

	mysql_query("set names 'utf8'");

  	mysql_select_db("BaiduNews", $con);

  	$getIndex = $_POST['index'];

  	$tableName = $_POST['name'];

  	$newsId = $_POST['id'];

  	$sql = "SELECT * FROM `".$tableName."`";

  	if ($newsId > 0) {
  		$sql = $sql." WHERE newsId = ".$newsId;
  	}

	$result = mysql_query($sql,$con);

	while ($row=mysql_fetch_array($result)) {
		$news = new News($row);
		switch ($getIndex) {
			case 'mobile':
				$news->outPut();
				break;
			case 'find':
				$news->findInfo();
				break;
			case 'modify':
				$news->setTable($tableName);
				$news->modifyInfo();
				break;
			default:
				break;
		}
	}
	// 关闭数据库连接
	mysql_close($con);
 ?>