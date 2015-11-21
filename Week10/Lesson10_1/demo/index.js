$(document).ready(function() {
    // 最顶部的设置的栏目
    $("#set-top").hover(function() {
        $("#find-setting").show();
    }, function() {
        $("#find-setting").hide();
    });
    // 自身的hover 使其显示出来
    $(".hover-self").hover(function() {
        $(this).show();
    }, function() {
        $(this).hide();
    });
    // 更多产品的显示
    $(".nav-production").hover(function() {
        $("#more-pro").show();
    }, function() {
        $("#more-pro").hide();
    });
    // 用户信息设置的显示
    $("#nav-user").hover(function() {
        $("#user-setting").show();
    }, function() {
        $("#user-setting").hide();
    });

    $("#weather-wrapper").hover(
        function() {
            $("#s_mod_setweather").show();
        },
        function() {
            $("#s_mod_setweather").hide();
        }
    );

    // 输入框获得焦点
    $("#txt").focus(function() {
        $("#txtspn").css("border", "1px solid #38f");
    });
    // 输入框失去焦点
    $("#txt").blur(function() {
        $("#txtspn").css("border", "1px solid #b6b6b6");
    });
    //左侧导航选择条目的对应类的添加或者删除
    $(".classfy a").click(function() {
        $(this).addClass("nav-current");
        $(this).siblings().removeClass("nav-current");
        var index = $(this).index($(this).parent().children());
        // 为什index是-1而不是1，在上面的是哥哥？？3项的时候后面的两项的显示都是-1
        if (index === -1) {
            $("#nav-item-first").addClass("hidden");
            $("#nav-item-second").removeClass("hidden");
        } else {
            $("#nav-item-first").removeClass("hidden");
            $("#nav-item-second").addClass("hidden");
        }
    });
    // 导航中选择条目的对应类的添加或者删除
    $("#love-items li").click(function() {
        $(this).addClass("current");
        $(this).siblings().removeClass("current");
        var index = $(this).index($(this).parent().children());
        if (index === -1) {
            $("#main-pro-first").addClass("hidden");
            $("#main-pro-second").removeClass("hidden");
        } else {
            $("#main-pro-first").removeClass("hidden");
            $("#main-pro-second").addClass("hidden");
        }
    });
    // 音乐导航条的点击事件
    $(".bd-fmjs-ccpnl a").click(function() {
        $(this).css("background", "#38f");

        $(this).siblings().css("background", "#fff");
    });
    // 这个有问题，目前不太会解决
    $("#more-pro").css("height", $(window).height());
    $("body").css("height", $(window).height());
});
