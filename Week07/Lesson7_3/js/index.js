var dataImg = {
	"data": [{
		"src": "1.jpg"
	}, {
		"src": "2.jpg"
	}, {
		"src": "3.jpg"
	}, {
		"src": "4.jpg"
	}, {
		"src": "5.jpg"
	}, {
		"src": "6.jpg"
	}]
};


// window.onload必须等到页面内包括图片的所有元素加载完毕后才能执行。、
// 事件执行的过程
$(window).on("load", function() {
	imgLocation();
	// 图片的信息存储

	// 滚轮在窗体内滚动的事件
	// 当图片不够时加载图片，一次加载6张
	window.onscroll = function() {
		if (scrollSide()) {
			$.each(dataImg.data, function(index, value) {

				var box = $("<div>").addClass("box").appendTo($("#container"));

				var content = $("<div>").addClass("content").appendTo(box);

				$("<img>").attr("src", "./images/" + $(value).attr("src")).appendTo(content);
			});
			imgLocation();
		};

		// 同步移动显示大图的位置
		$("#fixed").css("top", $(window).scrollTop());
	};
});

$(function() {
	$("#fixed").click(function() {
		$(this).slideUp(1000);
	});
});

/**
 * [scrollSide 判断是否需要加载图片]
 * @return {[boolean]} [返回true表示可以加载 false表示无需加载]
 */
function scrollSide() {
	var box = $(".box");

	var lastBoxHeight = box.last().get(0).offsetTop +
		Math.floor(box.last().height() / 2);

	// 这个视频里面有错误 使用的高度有误
	var windowHeight = $(window).height();

	var scrollHeight = $(window).scrollTop();

	return (lastBoxHeight < scrollHeight + windowHeight) ? true : false;
}

/**
 * [imgLocation 对html页面中的图像进行排版]
 */
function imgLocation() {
	var box = $(".box");

	// 绑定图片的click事件 显示图片
	box.click(function() {
		var imgSrc = $(this).children().children().attr("src");

		$("#bigImg").attr("src", imgSrc);

		$("#fixed").slideDown(1000);
	})

	var boxWidth = box.eq(0).width();

	var num = Math.floor($(window).width() / boxWidth);

	// 实现父容器的居中
	$("#container").css("padding-left",
		Math.floor(($(window).width() - boxWidth * num) / 2) + "px");

	var boxArr = [];

	box.each(function(index, value) {
		var boxHeight = box.eq(index).height();

		if (index < num) {
			boxArr[index] = boxHeight;
		} else {
			var minboxHeight = Math.min.apply(null, boxArr);

			var minboxIndex = $.inArray(minboxHeight, boxArr);

			$(value).css({
				"position": "absolute",

				// "top": number,  这种不带px也可以  默认后缀为px
				"top": minboxHeight,

				"left": box.eq(minboxIndex).position().left
			});
			boxArr[minboxIndex] += box.eq(index).height();
		}
	});
}