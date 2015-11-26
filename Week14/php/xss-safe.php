<?php
	// 设置编码格式为utf-8
	header("Content-type: text/html;charset=utf-8");

	/**
	 * [label_safe 对输入标签内的数据做处理 防止xss注入侵袭]
	 * @param  [$xss] 作为输入的字符串
	 * @return [string] 经过处理的输入
	 */
	function label_safe($xss){
		// 除去两端的空格号
		$str = trim($xss);

		// 函数删除由 addslashes() 函数添加的反斜杠
    	$str = stripslashes($str);

    	// 函数把预定义的字符转换为HTML实体。
    	// 避免标签号等对DOM结构的影响
		$str = htmlspecialchars($str);

		return $str;
	}  
?>