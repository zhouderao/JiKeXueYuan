<?php 
	// 设置编码格式为utf-8
	header("Content-type: text/html;charset=utf-8");

	// 需要引入函数 xss防御
	require_once 'xss-safe.php';
	/**
	* 一个信息类 承载一跳信息需要的7个属性
	*/
	class News
	{
		// 5个属性  对应服务器中的数值
		private $id;
		private $title;
		private $img;
		private $content;
		private $time;
		private $classfy;
		// 构造函数
		function __construct($result)
		{
			$this->id = $result["id"];
			$this->classfy = $result["classfy"];
			
			$this->title = label_safe($result["title"]);
			$this->img = label_safe($result["img"]);
			$this->content = label_safe($result["content"]);
			$this->time = label_safe($result["time"]);
		}
		// 对应百度新闻手机页面的输出
		public function outPut()
		{
			echo "<div class='container index-list'><h5>".$this->title."
			</h5>"."<div class='col-xs-4 fit'><img src=".$this->img.">
			"."<span>".$this->time."</span></div>"."<div class='col-xs-8'>
			<p>&nbsp;&nbsp;".$this->content."</p></div></div>";
		}

		// 对应表格中的输出
		public function findInfo()
		{
			echo "<tr><td>".$this->id."</td><td>".$this->title."</td>
                 <td>".$this->time."</td><td>".$this->img."</td><td>...</td>
                 <td>
                 <button class='btn btn-warning' onclick='showModify(this.value)' value=".$this->id.">
                 修改</button>
                 <button class='btn btn-danger' onclick='removeClick(this.value)' value=".$this->id.">
                 删除</button>
                 </td></tr>";
		}


		public function modifyInfo()
		{
			$str = "'".$this->title." ".$this->img." ".$this->content." ".$this->time."'";
			echo "<input type='text' readonly name='newsId' value=".$this->id.">
                <input type='text' readonly name='tableName' value=".$this->classfy.">
                <h5>新闻标题：</h5>
                <input type='text' class='full-width' name='newsTitle' value=".$this->title." onchange='changeTitle(this.value)'>
                <h5>图片路径：</h5>
                <input type='text' class='full-width' name='newsImg' value=".$this->img."  onchange='changeImg(this.value)'>
                <h5>新闻内容：</h5>
                <textarea class='full-width news-content' onchange='getContent(this.value)'>".$this->content."</textarea>
                <input type='date' name='addTime' value=".$this->time." onchange='changeTime(this.value)'>
                <input type='submit' class='float-right btn btn-danger' name=$str onclick='updateData(this.name)' value='保存'>
                <input type='button' class='float-right btn btn-info' onclick='hideModify()' value='取消'>";
		}
	}
 ?>