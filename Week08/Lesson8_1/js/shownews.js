$(function() {

	// 绑定导航条的点击事件
    $(".nav-btn").bind('click', function() {
        $(this).find('span').css('border-bottom','1px solid #fff');
        
        $(this).siblings().find('span').css('border-bottom','none');

        navClick($(this).attr('value'));
    });

    $("#show").click(function() {
    	// 显示或隐藏起始的隐藏项目
        $(".hddn").toggle();
        
        // 根据显示与否改变箭头的方向
        if ($(".hddn").css('display') == 'none') {
        	$("#triangle").addClass("down-triangle");
            $("#triangle").removeClass("up-triangle");
        }else{
        	$("#triangle").removeClass("down-triangle");
            $("#triangle").addClass("up-triangle");
        }
    });

    alert("请先执行excute-once.php 将数据保存至MySQL中，我的root密码为空。主要经历放在了php+MySQL上面");
});

/**
 * [将数据str传递给output.php并将output.php片段加载至对应的区域]
 * @param  {[string]} str [传入至output.php的字符串] 
 */
function navClick(str) {
    $("#content").load("search.php", {
        "name": str,
        "index":"mobile",
        "id":0
    });
}
