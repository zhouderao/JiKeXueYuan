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
});

/**
 * [将数据str传递给dataHandle.php并将dataHandle.php片段加载至对应的区域]
 * @param  {[string]} str [传入至dataHandle.php的字符串] 
 */
function navClick(str) {
    $("#content").load("./php/dataHandle.php", {
        "hash":$("#hash").val(),
        "method":"search",
        "name": str,
        "index":"mobile",
        "id":0
    });
}
