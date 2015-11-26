<?php 
	// 设置编码格式为utf-8
	header("Content-type: text/html;charset=utf-8");

	// 引入类News
	include 'news.php';

	/**
	* 转换为slq的字符串 作为sql字符串的处理
	* 以及后置数据的输出
	*/
	class SqlString
	{
		private $method;   		//增删改查的方法
		private $sql;			//查询数据的sql语句
		private $searchIndex;	//查询的方法

		private $id;       		//一条新闻的id
		private $title;    		//一条新闻的标题
		private $img;      		//一条新闻图像的url
		private $content;  		//一条新闻的内容
		private $time;     		//一条新闻的时间
		private $classfy;		//一条新闻的分类
		private $updateParam = array();   //更新新闻所需要的数组参数
		// 构造函数
		function __construct($method,$table)
		{
			$this->method = $method;
			switch ($this->method) {
				case 'search':
					$this->sql = "SELECT * FROM `".$table."`" ;
					$this->search();
					break;
				case 'add':
  					$this->sql = "INSERT INTO `".$table."`(`title`, 
  						`img`, `content`, `time`,`classfy`) VALUES ( ";
					$this->add();
					break;
				case 'dele':
					$this->sql = "DELETE FROM `".$table."` ";
					$this->dele();
					break;
				case 'update':
					$this->sql = "UPDATE `".$table."` SET ";
					$this->update();
					break;
				default:
					$this->sql = "";
					break;
			}
		}

		// 通过绑定对应参数进行查询
		public function BindParam($query_prepare)
		{
			switch ($this->method) {
				case 'search':
					$this->searchBind($query_prepare);
					break;
				case 'add':
					$this->addBind($query_prepare);
					break;
				case 'dele':
					$this->deleBind($query_prepare);
					break;
				case 'update':
					$this->updateBind($query_prepare);
					break;
				default:
					break;
			}
		}

		private function searchBind($query_prepare)
		{
			if ($this->id > 0)
				$query_prepare->bind_param("i",$this->id);
		  	else
				$query_prepare->bind_param("s",$this->classfy);
		}

		private function addBind($query_prepare)
		{
			$query_prepare->bind_param("sssss",$this->title,$this->img
				,$this->content,$this->time,$this->classfy);
		}

		private function deleBind($query_prepare)
		{
			$query_prepare->bind_param("i",$this->id);
		}

		private function updateBind($query_prepare)
		{
			$query_prepare->bind_param("ssssi",$this->title,$this->img,
				$this->content,$this->time,$this->id);
		}

		// 查询的sql语句处理
		private function search()
		{
			$this->searchIndex = $_POST['index'];
			$this->classfy = $_POST['name'];
			$this->id = $_POST['id'];
		  	if ($this->id > 0)
		  		$this->sql = $this->sql." where id = ?";
		  	else
		  		$this->sql = $this->sql." where classfy=?";
		}

		// 添加的sql语句处理
		private function add()
		{
		  	$this->classfy = $_POST['name'];
		  	$this->time =  $_POST['time'];

		  	$this->title = $_POST['title'];
		  	$this->img = $_POST['img'];
		  	$this->content = $_POST['content'];

			$this->sql = $this->sql."?,?,?,?,?)";
		}

		// 删除语句的处理
		private function dele()
		{
			$this->id = $_POST['id'];
			$this->sql = $this->sql." WHERE id= ?";
		}

		// 更新语句处理
		private function update()
		{
  			$this->id =   $_POST['id'];
			$this->time =  $_POST['time'];
		  	$this->title = $_POST['title'];
		  	$this->img = $_POST['img'];
		  	$this->content = $_POST['content'];

			$this->sql = $this->sql." `title`=?,`img`=?,`content`=?,`time`=? WHERE id= ?";
		}

		// 得到sql语句
		public function GetSql()
		{
			return $this->sql;
		}

		// 输出结果
		public function PrintData($query_prepare)
		{
			switch ($this->method) {
				case 'search':
					$this->searchPrint($query_prepare);
					break;
				case 'add':
					$this->addPrint();
					break;
				case 'dele':
					$this->delePrint();
					break;
				case 'update':
					$this->updatePrint();
					break;
				default:
					break;
			}
		}

		// 查询的输出
		private function searchPrint($query_prepare)
		{
			$query_prepare->bind_result($id,$title,$img,$content,$time,$classfy); 
			while($query_prepare->fetch()){
		    	$result = array('id'=>$id,'title'=>$title,'img'=>$img,
		    		'content'=>$content,'time'=>$time,'classfy'=>$classfy);
				$news = new News($result);
				switch ($this->searchIndex) {
					case 'mobile':
						$news->outPut();
						break;
					case 'find':
						$news->findInfo();
						break;
					case 'modify':
						$news->modifyInfo();
						break;
					default:
						break;
				}
			} 
		}

		// 添加成功的输出
		private function addPrint()
		{
			echo "添加成功";
		}

		// 删除成功的输出
		private function delePrint()
		{
			echo "删除成功";
		}

		// 更新成功的输出
		private function updatePrint()
		{
			echo "更新成功";
		}

	}
 ?>
