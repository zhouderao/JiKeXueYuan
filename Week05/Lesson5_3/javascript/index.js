// 初始化状态 是焦点能够聚焦到对应的位置
function initial() {
    document.getElementById('array').focus();
    document.getElementById('array').value = '';
    document.getElementById('num').innerHTML = '';
    document.getElementById('result').innerHTML = '';
}

// 获得结果并将其显示至页面上放
function getResult() {
    var str = document.getElementById('array').value;
    if (str.length == 0) {
        alert('请输入内容');
        initial();
        return;
    }

    var a;
    var b = 0;
    var result = [];
    var resultB = [];

    for (var i = 0; i < str.length; i++) {
        a = str.charAt(i);

        if (a == b)
            break;

        for (var j = i; j < str.length; j++) {
            if (str.charAt(j) == a)
                result.push(j);
        };

        if (result.length > resultB.length) {
            resultB = result;
            b = a;
        }

        result = [];
    }

    document.getElementById('num').innerHTML = b;
    // 先将之前的字符串重置清空
    document.getElementById('result').innerHTML = '';
    for (var i = 0; i < resultB.length; i++) {
        document.getElementById('result').innerHTML += ' ' + resultB[i];
    };
}

//传入 event 输入完数字按下enter键就有反应了
function EnterPress(e) {
    var e = e || window.event;
    if (e && e.keyCode == 13) {
        getResult();
    }
}