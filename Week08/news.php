<?php 
	// 设置编码格式为utf-8
	header("Content-type: text/html;charset=utf-8");

	/**
	* 一个信息类 承载一跳信息需要的5个属性
	*/
	class News
	{
		// 5个属性  对应服务器中的数值
		private $newsId;
		private $newsTitle;
		private $newsImg;
		private $newsContent;
		private $addTime;
		private $tableName;

		// 构造函数
		function __construct($row)
		{
			$this->newsId = $row["newsId"];
			$this->newsTitle = $row["newsTitle"];
			$this->newsImg = $row["newsImg"];
			$this->newsContent = $row["newsContent"];
			$this->addTime = $row["addTime"];
		}

		// 修改标题
		public function setTitle($title)
		{
			$this->newsTitle = $title;
		}

		// 修改图片路径
		public function setImg($img)
		{
			$this->newsImg = $img;
		}

		// 修改内容
		public function setContent($content)
		{
			$this->newsContent = $content;
		}

		// 修改时间
		public function setTime($time)
		{
			$this->addTime = $time;
		}

		public function setTable($table)
		{
			$this->tableName = $table;
		}

		// 对应百度新闻手机页面的输出
		public function outPut()
		{
			echo "<div class='container index-list'><h5>".$this->newsTitle."
			</h5>"."<div class='col-xs-4 fit'><img src=".$this->newsImg.">
			"."<span>".$this->addTime."</span></div>"."<div class='col-xs-8'>
			<p>&nbsp;&nbsp;".$this->newsContent."</p></div></div>";
		}

		// 对应表格中的输出
		public function findInfo()
		{
			echo "<tr><td>".$this->newsId."</td><td>".$this->newsTitle."</td>
                 <td>".$this->addTime."</td><td>".$this->newsImg."</td><td>...</td>
                 <td>
                 <button class='btn btn-warning' onclick='showModify(this.value)' value=".$this->newsId.">
                 修改</button>
                 <button class='btn btn-danger' onclick='removeClick(this.value)' value=".$this->newsId.">
                 删除</button>
                 </td></tr>";
		}


		public function modifyInfo()
		{
			echo "<input type='text' readonly name='newsId' value=".$this->newsId.">
                <input type='text' readonly name='tableName' value=".$this->tableName.">
                <h5>新闻标题：</h5>
                <input type='text' class='full-width' name='newsTitle' value=".$this->newsTitle." onchange='changeTitle(this.value)'>
                <h5>图片路径：</h5>
                <input type='text' class='full-width' name='newsImg' value=".$this->newsImg."  onchange='changeImg(this.value)'>
                <h5>新闻内容：</h5>
                <textarea class='full-width news-content' onchange='getContent($(this).val())'>".$this->newsContent."</textarea>
                <input type='date' name='addTime' value=".$this->addTime."   onchange='changeTime(this.value)'>
                <input type='submit' class='float-right btn btn-danger' onclick='updateData()' value='保存'>
                <input type='button' class='float-right btn btn-info' onclick='hideModify()' value='取消'>";
		}
	}
 ?>