var selectedItem;
var dataID = 1;
var newsTitle = "";
var newImg = "";
var newsContent = "";
var addTime = "";
$(function() {
    // 绑定导航条的点击事件
    $(".click-data").bind('click', function() {
        selectedItem = $(this).attr('value');
        itemClick();
    });

    // 删除按钮点击事件删除按钮
    $("#deleteBtn").click(function() {
        dltDate();
        $("#delete").hide(1000);
        setTimeout(function() {
            $("#data").load("./php/dataHandle.php", {
                "hash":$("#hash").val(),
                "method":"search",
                "name": selectedItem,
                "index": "find",
                "id": 0
            });
        }, 500);
    });

    // 删除取消点击事件按钮
    $("#cancelBtn").click(function() {
        $("#delete").hide();
    });

    // 添加项目按钮点击事件
    $("#addBtn-face").click(function() {
        if (selectedItem) {
            $("#add").show();
            $("#addInfo").text("输入信息");
        }
    });

    // 添加项目的保存按钮点击事件
    $("#addSave").click(function() {
        var newsTitleAdd = $("#newsTitle").val();
        var newImgAdd = $("#newImg").val();
        var newsContentAdd = $("#newsContent").val();
        var addTimeAdd = $("#addTime").val();
        if (!newsTitleAdd) {
            alert("请输入标题");
            return;
        };
        if (!newImgAdd) {
            alert("请输入图片");
            return;
        };
        if (!newsContentAdd) {
            alert("请输入内容");
            return;
        };
        if (!addTimeAdd) {
            alert("请输入时间");
            return;
        };
        $("#add").hide(1000);
        $("#addInfo").load("./php/dataHandle.php", {
            "method":"add",
            "name": selectedItem,
            "title": newsTitleAdd,
            "img": newImgAdd,
            "content": newsContentAdd,
            "time": addTimeAdd
        });
        setTimeout(function() {
            $("#data").load("./php/dataHandle.php", {
                "hash":$("#hash").val(),
                "method":"search",
                "name": selectedItem,
                "index": "find",
                "id": 0
            });
        }, 500);
    });
    
    // 添加项目的取消按钮点击事件
    $("#addCancel").click(function() {
        $("#add").hide();
    });
});

/*ajax加进来的元素用onclick绑定会更好
 *显示和隐藏修改界面
 */
// 显示修改界面
function showModify(obj) {
    $("#modify").slideDown(1000);
    dataID = obj;
    modifyClick();
}

// 隐藏修改界面
function hideModify() {
    $("#modify").slideUp(1000);
}

// 获得content
function getContent(str) {
    newsContent = str;
}

// 获得title
function changeTitle(str) {
    newsTitle = str;
}

// 获得img
function changeImg(str) {
    newImg = str;
}

// 获得time
function changeTime(str) {
    addTime = str;
}

// 按钮的删除事件
function removeClick(str) {
    dataID = str;
    $("#delete").show();
    $("#info").text("确定要删除吗？");
}

/**
 * [search.php片段加载至对应的区域]
 * @param  {[string]} str [传入至search.php的字符串] 
 */
// 一个分组的点击事件
function itemClick() {
    $("#data").load("./php/dataHandle.php", {
        "hash":$("#hash").val(),
        "method":"search",
        "name": selectedItem,
        "index": "find",
        "id": 0
    });
}

// 修改按钮的点击事件
function modifyClick() {
    $("#modify").load("./php/dataHandle.php", {
        "hash":$("#hash").val(),
        "method":"search",
        "name": selectedItem,
        "index": "modify",
        "id": dataID
    });
}

// 更新数据的按钮的绑定事件
function updateData(str) {
    var strs= new Array(); //定义一数组 
    strs=str.split(" "); //字符分割
    if (!newsTitle) {
        newsTitle  = strs[0];
        return;
    };
    if (!newImg) {
        newImg  = strs[1];
        return;
    };
    if (!newsContent) {
        newsContent  = strs[2];
        return;
    };
    if (!addTime) {
        addTime  = strs[3];
        return;
    };

    $("#modify").load("./php/dataHandle.php", {
        "hash":$("#hash").val(),
        "method":"update",
        "id": dataID,
        "title": newsTitle,
        "img": newImg,
        "content": newsContent,
        "time": addTime
    });

    setTimeout(function() {
        $("#data").load("./php/dataHandle.php", {
            "hash":$("#hash").val(),
            "method":"search",
            "name": selectedItem,
            "index": "find",
            "id": 0
        });
    }, 500);

    $("#modify").hide(1000);
}

// 删除数据
function dltDate() {
    $("#info").load("./php/dataHandle.php", {
        "hash":$("#hash").val(),
        "method":"dele",
        "name": selectedItem,
        "id": dataID
    });
}
