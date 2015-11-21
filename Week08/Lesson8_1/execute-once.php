<?php 
	// 向服务器添加数据的代码
	// 设置编码格式为utf-8
	header("Content-type: text/html;charset=utf-8");

	// 连接MySQL数据库：我的root密码为空 
	$con = mysql_connect("localhost","root","");

	// 判断是否连接失败
	if (!$con){
  		die('Could not connect:'.mysql_error());
  	}else{
  		echo "连接成功";
  		echo "<br/>";
  	}

  	// 设置SQL语句的编码
	mysql_query("set names 'utf8'");

	// 创建数据库
  	if (mysql_query("CREATE DATABASE BaiduNews",$con)){
  		echo "数据库创建成功";
  		echo "<br/>";
  	}else{
  		echo "创建数据库出错: ".mysql_error();
  	}

  	// 选择数据库并链接
  	mysql_select_db("BaiduNews", $con);

  	// 创建表格
	// 第一项：推荐
	$sql = "CREATE TABLE recommend(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-推荐-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `recommend`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'十八届中央委员会第五次全体会议公报（全文）',
			'./images/recommend/1.jpg',
			'央广网北京10月29日消息据中国之声《全国新闻联播》报道，中国共产党第十八届中央委员会第五次...',
			'2015-09-28')";
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `recommend`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'习近平：十三五规划尊重经济规律 走出中等收入国家陷阱',
			'./images/recommend/2.jpg',
			'民生与消费成为走出中等收入国家陷阱的重要支撑，而民生与消费的持续动力则来自社会经济领域全方位的...',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `recommend`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'中共全会公报允许普遍二孩政策',
			'./images/recommend/3.jpg',
			'&nbsp;&nbsp;中共全会公报允许普遍二孩政策。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `recommend`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'经纪人间接承认庾澄庆新恋情',
			'./images/recommend/4.jpg',
			'至于前妻伊能静昨天没有回应，仅在微博留言，文字透露出的心情平静。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

	// 创建表格
	// 第二项：百家
	$sql = "CREATE TABLE baijia(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-百家-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `baijia`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'《山河故人》影评：贾樟柯的乡愁',
			'./images/baijia/1.jpg',
			'《山河故人》秉承了贾樟柯一贯的风格，山西和山西人的故事，聚焦于普通人的生老病死以及爱情，赵涛依...',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `baijia`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'学阿里搞开放，王老吉搭建生态系统',
			'./images/baijia/2.jpg',
			'187岁的王老吉对外开放，构建凉茶生态系统，能走多远，让我们拭目以待吧。',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `baijia`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'国美双11频放大招，能否实现主场到行业前三的质变？',
			'./images/baijia/3.jpg',
			'据此要向外界表达国美在线决战双11的信心和决心。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `baijia`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'开放二胎对A股是利好么？且看美国经验',
			'./images/baijia/4.jpg',
			'按照美国的那套理论，股市投资从成年后开始，那么即使眼下二胎们呱呱坠地了，对A股的利好也是要在差...',
			'2015-09-28')";

	$result = mysql_query($sql,$con);


	// 创建表格
	// 第三项：本地
	$sql = "CREATE TABLE local(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-本地-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `local`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'京媒:北京球队不愿当背景帝 小成本运作不行了 ',
			'./images/local/1.jpg',
			'冠军悬念仍未揭晓，而北京国安可能将以“四大皆空”的战绩收官。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `local`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'东方网络(002175)拟设立北京分公司',
			'./images/local/2.jpg',
			'公司第五届董事会第十七会议审议通过《关于设立分公司的议案》，设立东方时代网络传媒股份有限公司北...',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `local`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'PPmoney闪耀北京金博会 新金融助力实体经济(组图)',
			'./images/local/3.jpg',
			'被誉为“中国金融业风向标”的第十一届北京国际金融博览会于北京展览馆正式拉开帷幕。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `local`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'被冲击的北京：李根出走夏季无援 内部挖潜定命脉',
			'./images/local/4.jpg',
			'至少从常规赛阶段来看CBA联赛的格局，酷似中国历史上那个烽烟四起、精彩纷呈、七雄并立的战国时代。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);


	// 创建表格
	// 第四项：图片
	$sql = "CREATE TABLE img(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-图片-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `img`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'十三五规划来了！经济大动作都有哪些',
			'./images/img/1.jpg',
			'国民经济和社会发展第十三个五年规划也正式公布。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `img`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'詹姆斯12分骑士痛打灰熊',
			'./images/img/2.jpg',
			'NBA常规赛继续进行，骑士106-76灰熊。',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `img`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'朱镕基现身清华校园',
			'./images/img/3.jpg',
			'在朱镕基推进下，清华大学经管学院成立了顾问委员会',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `img`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'高校黑暗料理新力作:橘子排骨',
			'./images/img/4.jpg',
			'四川农业大学的同学爆照吐槽食堂“新神作”：橘子烧排骨。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

	// 创建表格
	// 第五项：娱乐
	$sql = "CREATE TABLE fun(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-娱乐-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `fun`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'邓紫棋盼新恋情:要成熟有担当',
			'./images/fun/1.jpg',
			'邓紫棋的新专辑将在11月5日前，以每天推出一首新歌及其MV的速度曝光，实体专辑将会在11月6日...',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `fun`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'伊能静和儿子聚餐 画面温馨',
			'./images/fun/2.jpg',
			'母子俩一起度过温馨的时光，小王子长高许多，打扮帅气，伊能静与儿子合影，心情很不错。',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `fun`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'杨丞琳谈恋情打太极 脸红称不习惯公开',
			'./images/fun/3.jpg',
			'杨丞琳在香港出席某品牌发布会，杨丞琳一现身，就被追问与李荣浩的恋情。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `fun`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'杨千嬅谈夫妻之道:从不问行踪',
			'./images/fun/4.jpg',
			'讲到千嬅学生时代的情史，她无奈地回应，我当年读女校，没有几个男孩子追，好遗憾，好想经历被追。。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);


	// 创建表格
	// 第六项：社会
	$sql = "CREATE TABLE society(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-社会-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `society`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'福建农民从母猪肚中掏出怪蛋或值600万',
			'./images/society/1.jpg',
			'他求助本报，希望找专家帮助鉴别一下这究竟是个什么东西。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `society`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'中国移动偷流量?原是用户流量计算软件乌龙',
			'./images/society/2.jpg',
			'用户晒流量统计称身在国外还被中国移动“偷流量”。',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `society`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'宅女晚上看<琅琊榜>大笑 小偷以为撞鬼险跳楼',
			'./images/society/3.jpg',
			'海口市某12楼业主小琪，关了灯看《琅琊榜》，看到兴奋时突然一声大笑。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `society`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'四川一鱼塘疑遭投毒 6万斤鱼一夜死光损失30万',
			'./images/society/4.jpg',
			'相似案件：江西德兴鱼塘遭投毒 近4万斤鱼死亡 鱼塘白花花一片 6万斤即将...',
			'2015-09-28')";

	$result = mysql_query($sql,$con);


	// 创建表格
	// 第七项：军事
	$sql = "CREATE TABLE army(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-军事-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `army`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'美司令敏感时刻将访北京 中国连续抗议美舰挑衅',
			'./images/army/1.jpg',
			'美国与中国的博弈还在继续，美国防长婉转地表明将再次行动，而中国外交部则连续两天抗议美舰擅闯南海。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `army`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'吴胜利今晚将与美军视频通话表达南海严正立场',
			'./images/army/2.jpg',
			'这也是今年9月中美两国国防部签署两个互信机制新增附件后的首次通话。',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `army`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'不受美舰闯入影响 中澳南海军演将照常进行',
			'./images/army/3.jpg',
			'虽然澳大利亚国防部长公开支持美国海军闯进中国南海岛礁12海里，但中国与澳大利亚的联合军演将不会...',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `army`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'日称拦截中国战机创新高 国防部回应有飞越自由',
			'./images/army/4.jpg',
			'日本计划将冲绳那霸基地的F-15战机增至两个中队，目前那霸基地在应对中国军机紧急起飞任务中处于...',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

	// 创建表格
	// 第八项：科技
	$sql = "CREATE TABLE tech(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-军事-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `tech`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'三星A5续作获蓝牙认证',
			'./images/tech/1.jpg',
			'视频：三星全金属手机GALAXYA5上手，时长约8分27秒。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `tech`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'习近平：十三五规划尊重经济规律 走出中等收入国家陷阱',
			'./images/tech/2.jpg',
			'民生与消费成为走出中等收入国家陷阱的重要支撑，而民生与消费的持续动力则来自社会经济领域全方位的...',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `tech`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'iOS 9.2 beta 1对比iOS 9.1:速度响应有提升',
			'./images/tech/3.jpg',
			'希望到正式版发布的时候，iOS9.2也能够有这样的提升和改进，旧设备用户将会非常乐于听到这样的消息。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `tech`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'Avast：丢失的智能手机都去了哪里？',
			'./images/tech/4.jpg',
			'每部智能手机都注明了万一丢失返还手机的地址和联系方式。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);


	// 创建表格
	// 第九项：互联网
	$sql = "CREATE TABLE net(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-互联网-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `net`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'阿里巴巴将开拓电商下乡业务',
			'./images/net/1.jpg',
			'饿了么说要在3年内上市；一加发布中端新品；GoPro，Paypal，Yelp，Sony，三星公...',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `net`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'全面放开二胎了，你的创业思路是不是也要升级了？',
			'./images/net/2.jpg',
			'全面二胎政策终于来了，对于拥有创业激情的你来说，这究竟意味着什么。',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `net`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'期待与施密特两年后的再会：所有人都在改变',
			'./images/net/3.jpg',
			'一个跟现在的北京几乎一样寒冷的时节，当时的谷歌董事会主席埃里克·施密特来到了中国，出现在一次大...',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `net`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'VR 电影来了，摄影构图是不是就可以不谈了？',
			'./images/net/4.jpg',
			'本文来自投稿，作者黄暾，清显科技内容总监。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

	// 创建表格
	// 第十项：女人
	$sql = "CREATE TABLE women(
		newsId int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(newsId),
		newsTitle varchar(100),
		newsImg varchar(200),
		newsContent text,
		addTime date) DEFAULT CHARSET=utf8";

	$result = mysql_query($sql,$con);
	if (!$result) {
		die('Error:'.mysql_error());
	}else{
		echo "创建表格-女人-成功";
  		echo "<br/>";
	}

	// 插入多条数据
    $sql = "INSERT INTO `women`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'全面放开二孩 如何正确备孕？',
			'./images/women/1.jpg',
			'会议通过普遍二孩政策，废除“一胎”政策，全面放开中国公民生育二孩的权利。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `women`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'15个小问题测试宝宝免疫力',
			'./images/women/2.jpg',
			'回答“是”或“不是”，如果答案是“是”，得1分，如果答案是“不是”则不得分，最后根据总得分看宝...',
			'2015-09-28')";
	
	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `women`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'来看看你的星座是不是玻璃心',
			'./images/women/3.jpg',
			'一直觉得巨蟹座活的很累，操心这个担心那个，明明怕的要死，还要装作一点都不敏感你放马过来的样子。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

    $sql = "INSERT INTO `women`(`newsTitle`, `newsImg`, `newsContent`, `addTime`) 
		VALUES (
			'同是咳嗽，却是不一样的病',
			'./images/women/4.jpg',
			'咳嗽是孩子非常常见的一种症状，几乎没有孩子没咳嗽过。',
			'2015-09-28')";

	$result = mysql_query($sql,$con);

	// 关闭数据库连接
	mysql_close($con);
?>