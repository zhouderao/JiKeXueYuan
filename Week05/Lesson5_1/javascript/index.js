/**
 * [divide description] 对数字的类型等判断
 */
function divide() {
	var numStr = document.getElementById("number").value;

	// 判断类型是否为数字或者是否为空
	if (isNaN(numStr) || numStr == '') {
		alert('请输入数字');
		initial();
		return;
	};
	var num = parseInt(numStr);

	// 判断数字是否在范围
	if (num > 100 || num < 0) {
		alert('请输入0~100的数字');
		initial();
		return;
	};
	if (num == 0)
		num=1;
	var result = Math.floor(11 - num / 10) + "等生";
	document.getElementById("answer").innerHTML = result;
}

// 初始化界面的状态
function initial() {
	document.getElementById("number").value = '';
	document.getElementById("answer").innerHTML = '请输入数字，等待结果';
	document.getElementById("number").focus();
}

function EnterPress(e) {
	var e = e || window.event;
	if (e && e.keyCode == 13) {
		divide();
	}
}