<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>百度新闻首页</title>
	<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>

	<link rel="stylesheet" type="text/css" href="./stylesheets/bootstrap.min.css">
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="./stylesheets/shownews.css">
	<script type="text/javascript" src="./js/shownews.js"></script>
</head>
<body>
	<!-- SCRF防御 -->
    <?php 
        $value = 'DefenseSCRF';
        setcookie('cookie', $value, time()+3600);
        $hash = md5($_COOKIE['cookie']);
     ?>
    <input type="hidden" id="hash" value="<?=$hash;?>">
	<!-- 头部 -->
	<header>
		<div class="container-fluid head-info">
			<div class="col-xs-1 baidu_icon logo"></div>
			<div class="col-xs-2 baidu_icon person"></div>
			<div class="col-xs-6 baidu_logo"></div>
			<div class="col-xs-2 baidu_icon search"></div>
			<div class="col-xs-1 baidu_icon add"></div>
		</div>
	</header>
	<!-- 导航栏 -->
	<nav>
		<div class="container-fluid head_nav">
			<div class="col-xs-2 nav-btn" value="recom">
				<span>推荐</span>
			</div>
			<div class="col-xs-2 nav-btn" value="baijia">
				<span>百家</span>
			</div>
			<div class="col-xs-2 nav-btn" value="local">
				<span>本地</span>
			</div>
			<div class="col-xs-2 nav-btn" value="img">
				<span>图片</span>
			</div>	
			<div class="col-xs-2 nav-btn" value="fun">
				<span>娱乐</span>
			</div>
			<div class="col-xs-2 nav-btn" value="society">
				<span>社会</span>
			</div>
			<div class="col-xs-2 nav-btn" value="army">
				<span>军事</span>
			</div>
			<div class="col-xs-2 nav-btn" value="tech">
				<span>科技</span>
			</div>
			<div class="col-xs-4 nav-btn" value="net">
				<span>互联网</span>
			</div>	
			<div class="col-xs-2 nav-btn" value="women">
				<span>女人</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>生活</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>国际</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>国内</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>体育</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>汽车</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>财经</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>房产</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>时尚</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>教育</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>游戏</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>旅游</span>
			</div>
			<div class="col-xs-2 hddn">
				<span>人文</span>
			</div>
			<div class="col-xs-2" id="show">
				<span>更多</span>
				<div class="down-triangle" id="triangle"></div>
			</div>	
		</div>
	</nav>
	<!-- 中间部分 -->
	<article id="content">
		<div class="container index-list">
			<h5>十八届中央委员会第五次全体会议公报（全文）</h5>
			<div class="col-xs-4 fit">
				<img src="./images/recommend/1.jpg">
				<span>2015-09-28</span>
			</div>
			<div class="col-xs-8">
				<p>&nbsp;&nbsp;央广网北京10月29日消息据中国之声《全国新闻联播》报道，中国共产党第十八届中央委员会第五次...</p>
			</div>
		</div>
		<div class="container index-list">
			<h5>习近平：十三五规划尊重经济规律 走出中等收入国家陷阱</h5>
			<div class="col-xs-4 fit">
				<img src="./images/recommend/2.jpg">
				<span>2015-09-28</span>
			</div>
			<div class="col-xs-8">
				<p>&nbsp;&nbsp;民生与消费成为走出中等收入国家陷阱的重要支撑，而民生与消费的持续动力则来自社会经济领域全方位的...</p>
			</div>
		</div>
		<div class="container index-list">
			<h5>中共全会公报允许普遍二孩政策</h5>
			<div class="col-xs-4 fit">
				<img src="./images/recommend/3.jpg">
				<span>2015-09-28</span>
			</div>
			<div class="col-xs-8">
				<p>&nbsp;&nbsp;中共全会公报允许普遍二孩政策。</p>
			</div>
		</div>
		<div class="container index-list">
			<h5>经纪人间接承认庾澄庆新恋情</h5>
			<div class="col-xs-4 fit">
				<img src="./images/recommend/4.jpg">
				<span>2015-09-28</span>
			</div>
			<div class="col-xs-8">
				<p>&nbsp;&nbsp;至于前妻伊能静昨天没有回应，仅在微博留言，文字透露出的心情平静。</p>
			</div>
		</div>
	</article>
	<!-- 底部 -->
	<footer>
		<div class="container-fluid footing">
			<div class="col-xs-4 first_none">
				<a href="#" class="first">意见反馈</a>
			</div>
			<div class="col-xs-4">
				<a href="#" class="second">应用推荐</a>
			</div>
			<div class="col-xs-4" class="third">
				<a href="#">客户端</a>
			</div>
		</div>
	</footer>
</body>
</html>