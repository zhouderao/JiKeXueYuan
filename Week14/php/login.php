<?php 
	// 设置编码格式为utf-8
	header("Content-type: text/html;charset=utf-8");
	// 这个有前端输入的处理  这里需要引入xss防御
	// 之前数据库设计存在缺陷 没有设计帐号和密码的选项
	// 
	// 需要引入函数
	require_once 'xss-safe.php';
	$hash = md5($_COOKIE['cookie']);

	// 判断是否是对应的cookie
	// 不是就返回
	if ($_POST['hash'] != $hash)
		return;
	
	// 对输入的用户名和密码进行标签转义进行
	$name = label_safe($_POST['name']);
	$password = label_safe($_POST['password']);

	if ($name != "root" || $password != "")
		echo "帐号或密码有误";
	else
		echo "成功登录";
 ?>