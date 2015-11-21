$(function() {
    $("#submit").click(function() {
        $.ajax({
            url: '/login',
            type: 'post',
            dataType: "json",
            data: {
                'name': $("#name").val(),
                'password': $("#password").val()
            },
            success: function(data) {
            	if (data['success'] == 1) {
            		window.location.href = "/";
            	}else{
            		$("#tips").text("帐号密码有错误");
            		$("#name").val('');
            	}
            }
        });
    });
});
