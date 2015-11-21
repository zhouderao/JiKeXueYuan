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

    $("#deleteBtn").click(function() {
        dltDate();
        $("#delete").hide(1000);
        setTimeout(function() {
            $("#data").load("search.php", {
                "name": selectedItem,
                "index": "find",
                "id": 0
            });
        }, 500);
    });

    $("#cancelBtn").click(function() {
        $("#delete").hide();
    });
    $("#addBtn-face").click(function() {
        if (selectedItem) {
            $("#add").show();
            $("#addInfo").text("输入信息");
        }
    });

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
        $("#addInfo").load("add.php", {
            "name": selectedItem,
            "title": newsTitleAdd,
            "img": newImgAdd,
            "content": newsContentAdd,
            "time": addTimeAdd
        });
        setTimeout(function() {
            $("#data").load("search.php", {
                "name": selectedItem,
                "index": "find",
                "id": 0
            });
        }, 500);
    });

    $("#addCancel").click(function() {
        $("#add").hide();
    });
});

/*ajax加进来的元素用onclick绑定会更好
 *显示和隐藏修改界面
 */
function showModify(obj) {
    $("#modify").slideDown(1000);
    dataID = obj;
    modifyClick();
}

function hideModify() {
    $("#modify").slideUp(1000);
}

function getContent(str) {
    newsContent = str;
}

function changeTitle(str) {
    newsTitle = str;
}

function changeImg(str) {
    newImg = str;
}

function changeTime(str) {
    addTime = str;
}

function removeClick(str) {
    dataID = str;
    $("#delete").show();
    $("#info").text("确定要删除吗？");
}

/**
 * [search.php片段加载至对应的区域]
 * @param  {[string]} str [传入至search.php的字符串] 
 */
function itemClick() {
    $("#data").load("search.php", {
        "name": selectedItem,
        "index": "find",
        "id": 0
    });
}

function modifyClick() {
    $("#modify").load("search.php", {
        "name": selectedItem,
        "index": "modify",
        "id": dataID
    });
}

function updateData() {
    $("#modify").load("update.php", {
        "name": selectedItem,
        "id": dataID,
        "title": newsTitle,
        "img": newImg,
        "content": newsContent,
        "time": addTime
    });
    setTimeout(function() {
        $("#data").load("search.php", {
            "name": selectedItem,
            "index": "find",
            "id": 0
        });
    }, 500);
    $("#modify").hide(1000);
}


function dltDate() {
    $("#info").load("delete.php", {
        "name": selectedItem,
        "id": dataID
    });
}
