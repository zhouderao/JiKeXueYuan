<?php
	// 设置编码格式为utf-8
	header("Content-type: text/html;charset=utf-8");
	// 引入SqlString的类文件
	include 'SqlString.php';
	
	$hash = md5($_COOKIE['cookie']);

	// 判断是否是对应的cookie
	// 不是就返回
	if ($_POST['hash'] != $hash)
		return;

	// 读取xml文件
	$myXml= simplexml_load_file('../config/config.xml');
	$mysqli = new mysqli($myXml->connect->host,$myXml->connect->name,
		$myXml->connect->password,$myXml->db->name); 
	//设置mysqli编码
	mysqli_query($mysqli,"SET NAMES utf8");

	//检查连接是否被创建
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	$method = $_POST['method'];
	$sqlModel = new SqlString($method,$myXml->db->table);
	$sql = $sqlModel->GetSql();
	$query_prepare = $mysqli->prepare($sql);
	$sqlModel->BindParam($query_prepare);
	$query_prepare->execute(); 
	$sqlModel->PrintData($query_prepare);
	$mysqli->close();
 ?>