var num1 = 0;
var num2 = 0;
var selectOption = "+";

function show(results) {
	document.getElementById('answer').innerHTML = results;
}

// 屏幕清0
function clearPrint() {
	num1 = 0;
	num2 = 0;
	selectOption = "+";
	show(num2);
}

/**  将数字显示头部框
 * @param  {[str]} 当前input所带的value值
 **/

function display(str) {
	var numStr = num2 + str;
	num2 = parseInt(numStr);

	if (num2 > 9999) {
		alert("输入数字不大于9999");
		return;
	}

	show(num2);
}

/**  将数字显示头部框
 * @param  {[str]} 当前input所带的value值
 */
function getOption(option) {
	selectOption = option;
	num1 = num2;
	num2 = 0;
	show(option);
}

/**  得到结果
 */
function result() {
	var result;

	switch (selectOption) {
		case '+':
			result = num2 + num1;
			break;
		case '-':
			result = num1 - num2;
			break;
		case '*':
			result = num2 * num1;
			break;
		case '/':
			if (num2 == 0) {
				alert("除数不能为0，请重新输入");
				return;
			};
			result = num1 / num2;
			// 只显示小数点后两位
			result = Math.round(result * 100) * 0.01;
			break;
		default:
			break;
	};

	num2 = result;
	show(num2);
}