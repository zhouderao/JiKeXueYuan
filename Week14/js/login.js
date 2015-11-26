$(function () {
    $("#submit").click(function() {
    	var userName = $("#user").val();
    	var password = $("#password").val();

    	// 传入数据检测是否登录成功
    	$(this).load("./php/login.php",{
            "hash":$("#hash").val(),
    		"name":userName,
    		"password":password
		},function(data) {
			if (data == "成功登录")
        		window.location.href="./index.php";
    	});
    });
});