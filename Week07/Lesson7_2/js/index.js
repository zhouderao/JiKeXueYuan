$(function() {
	/**
	 * @number {topIndex}         首页自动滚动效果条索引值
	 * @number {recomIndex}       推荐课程导航条索引值
	 * @number {enterPriseIndex}  战略合作企业滚动条索引值
	 * @number {schoolIndex}      合作院校滚动条索引值
	 * @number {newsIndex}        媒体报道滚动条索引值
	 */
	var topIndex = 0;
	var recomIndex = 0;
	var enterPriseIndex = 0;
	var schoolIndex = 0;
	var newsIndex = 0;

	//将分类导航条的一些属性直接绑定给style
	$(".lesson-list-show").css({
		"min-height": "410px",
		"width": "590.8px"
	});

	// 第一个功能
	// 当搜索文本框焦点
	$("#headsearch .search-text").focus(
		function() {
			$("#headsearch .hot-words").hide();
			$("#headsearch .search-btn").addClass("search-btn2");
		}
	);

	// 第一个功能
	// 当搜索文本框失去焦点
	$("#headsearch .search-text").blur(
		function() {
			$("#headsearch .hot-words").show();
			$("#headsearch .search-btn").removeClass("search-btn2");
		}
	);

	// 第二个功能
	// 右侧广告信息的隐藏
	$(".close").click(function() {
		$(this).parent().hide();
	});


	// 第三个功能
	// 左侧分类导航条的hover显示
	$(".lesson-classfiy-nav ul li").hover(function() {
			$(this).parent().css("overflow", "visible");
			$(".line").hide();
		},
		function() {
			$(this).parent().css("overflow", "hidden");
			$(".line").show();
		}
	);


	// 第四个功能
	// 带有左右滑动按钮的显示
	$(".banner-box").hover(function() {
			$(this).find(".arrow-left").show();
			$(this).find(".arrow-right").show();
		},
		function() {
			$(this).find(".arrow-left").hide();
			$(this).find(".arrow-right").hide();
		}
	);
	// 第五个功能
	// 主要内容的左右侧按钮广告栏目的切换
	$("#banner-left").click(function() {
		topIndex--;
		if (topIndex < 0) {
			topIndex = 4;
		};
		var pos = topIndex * (-570);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#advertise .swiper-wrapper").css("transform", tranPos);
		$(".pagination").find("span").eq(topIndex).addClass("swiper-active-switch");
		$(".pagination").find("span").eq(topIndex).siblings().removeClass("swiper-active-switch");
	});

	$("#banner-right").click(function() {
		topIndex++;
		if (topIndex > 4) {
			topIndex = 0;
		};
		var pos = topIndex * (-570);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#advertise .swiper-wrapper").css("transform", tranPos);
		$(".pagination").find("span").eq(topIndex).addClass("swiper-active-switch");
		$(".pagination").find("span").eq(topIndex).siblings().removeClass("swiper-active-switch");
	});


	// 第五个功能
	// 主要内容的按钮切换
	$(".pagination span").click(function() {
		var clickIndex = $(this).index();
		topIndex = clickIndex;
		var pos = topIndex * (-570);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#advertise .swiper-wrapper").css("transform", tranPos);
		$(this).addClass("swiper-active-switch");
		$(this).siblings().removeClass("swiper-active-switch");
	});

	// 第六个功能
	// 企业图标的切换
	$("#banner-left3").click(function() {
		enterPriseIndex++;
		if (enterPriseIndex == 15) {
			enterPriseIndex = 0;
		};
		var pos = enterPriseIndex * (-159);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#enterprise .swiper-wrapper").css("transform", tranPos);
	});

	$("#banner-right3").click(function() {
		enterPriseIndex--;
		if (enterPriseIndex == -1) {
			enterPriseIndex = 14;
		};
		var pos = enterPriseIndex * (-159);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#enterprise .swiper-wrapper").css("transform", tranPos);
	});

	// 第七个功能
	// 合作院校的图标切换
	$("#banner-left2").click(function() {
		schoolIndex++;
		if (schoolIndex == 17) {
			schoolIndex = 0;
		};
		var pos = schoolIndex * (-136.914);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#university .swiper-wrapper").css("transform", tranPos);
	});
	$("#banner-right2").click(function() {
		schoolIndex--;
		if (schoolIndex == -1) {
			schoolIndex = 16;
		};
		var pos = schoolIndex * (-136.914);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#university .swiper-wrapper").css("transform", tranPos);
	});

	// 第八个功能
	// 新闻媒体的图像的切换
	$("#banner-left4").click(function() {
		schoolIndex++;
		if (schoolIndex == 9) {
			schoolIndex = 0;
		};
		var pos = schoolIndex * (-159);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#news .swiper-wrapper").css("transform", tranPos);
	});
	$("#banner-right4").click(function() {
		schoolIndex--;
		if (schoolIndex == -1) {
			schoolIndex = 8;
		};
		var pos = schoolIndex * (-159);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#news .swiper-wrapper").css("transform", tranPos);
	});

	// 第九个功能
	// 隔断时间刷新广告
	function addIndex() {
		topIndex++;
		if (topIndex > 4) {
			topIndex = 0;
		};

		var pos = topIndex * (-570);
		var tranPos = "translate3d(" + pos + "px, 0px, 0px)"
		$("#advertise .swiper-wrapper").css("transform", tranPos);
		$(".pagination").find("span").eq(topIndex).addClass("swiper-active-switch");
		$(".pagination").find("span").eq(topIndex).siblings().removeClass("swiper-active-switch");
	}
	setInterval(addIndex, 3000);
	
	// 第十个功能
	// 回到顶部的按钮
	$(window).scroll(function() {
		console.log(1);
		var topS = $(document).scrollTop();
		if (topS > 40) {
			$("#gototop a.fistLink").show();
		} else {
			$("#gototop a.fistLink").hide();
		}
	});
	// 第十一个功能
	// 热门课程的显示
	$("#recommendName .cf li").hover(function() {
		$(this).addClass("on");
		$(this).siblings().removeClass("on");
		var selectedIndex = $(this).index();
		var items = $(".lesson-list");
		console.log(items);
		items.hide();
		$("#hot-lessonbox").find(items[selectedIndex]).show();
	});


	// 第十二个功能
	// 热门课程的详细显示
	$("#hot-lessonbox .cf li").hover(function() {
		$(this).find(".lesson-infor").addClass("lesson-hover");
		$(this).find(".lesson-infor").css("height", "175px");

		$(this).find("p").css({
			"height": "52px",
			"opacity": "1"
		});
		$(this).find("p").slideDown(1000);
	}, function() {
		$(this).find(".lesson-infor").removeClass("lesson-hover");
		$(this).find(".lesson-infor").css("height", "88px");
		$(this).find("p").css({
			"height": "0px",
			"opacity": "0"
		});
		$(this).find("p").slideUp(1000);
	});
});