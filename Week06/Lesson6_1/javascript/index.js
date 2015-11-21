/**
 * @inputBox 输入框的数字
 * @equalBox 等式框的数字
 * @nums 最后的一个数字
 * @result 等式的数组（中缀表达式）
 * @myStack 作为中缀栈转到后缀表达式中操作符号的栈
 * @outputArr 存储后缀表达式的数组
 * @enterOpt 是否已经输入运算符
 * @getRusult 是否得到结果
 */
var inputBox;
var equalBox;
var nums = 0;
var result = [];
var myStack = [];
var outputArr = [];
var enterOpt = false;
var getRusult = false;

//文档加载完毕 获取两个input文本框
window.onload = function() {
	equalBox = document.getElementById('smtext');
	inputBox = document.getElementById('lgtext');
}

/**
 * [对输入数字做处理，显示至输入框]
 * @param  {[number]} num [输入的数字]
 */
function dispaly(num) {
	if (inputBox.value.charAt(0) == '0' && inputBox.value.charAt(1) != '.' || inputBox.value == '输入无效')
		inputBox.value = '';
	if (num == 10)
	{
		num = '.';
		if(inputBox.value.charAt(inputBox.value.length-1) == '.')
			return;
	}
	if (getRusult) {
		inputBox.value = '';
		getRusult = false;
	}
	inputBox.value += num;
	if (inputBox.value.length >= 17) {
		return;
	}
	nums = parseFloat(inputBox.value);
	enterOpt = false;
}

//删除输入框最后输入的一个字符
function deleteOne() {
	if (inputBox.value == "0")
		return;
	var s = inputBox.value;
	s = s.substring(0, s.length - 1);
	if (s == '')
		s = "0";
	inputBox.value = s;
	nums = parseFloat(inputBox.value);
}

// 删除输入框的所有信息
function deleteLine() {
	inputBox.value = 0;
	nums = 0;
}

// 初始化所有状态
function initial() {
	nums = 0;
	result = [];
	remNum = 0;
	myStack = [];
	outputArr = [];
	enterOpt = false;
	getRusult = false;
	inputBox.value = 0;
	equalBox.value = "";
}

/**
 * [对一元运算符做处理，改变文本输入框的结果]
 * @param  {[string]} str [操作的类型]
 */
function operation(str) {
	if (nums == "输入有误") {
		nums = 0;
		inputBox.value = 0;
		result.pop();
	}
	switch (str) {
		case 'sin':
			nums = Math.sin(nums * Math.PI / 180);
			break;
		case 'cos':
			nums = Math.cos(nums * Math.PI / 180);
			break;
		case 'tan':
			if (nums % 180 == 90) {
				inputBox.value = "输入有误";
				return;
			}
			nums = Math.tan(nums * Math.PI / 180);
			break;
		case 'neg':
			nums *= -1;
			break;
		case 'fra':
			if (nums == 0) {
				inputBox.value = "输入有误";
				return;
			}
			nums = 1 / nums;
			break;
		case 'sqr':
			if (nums < 0) {
				inputBox.value = "输入有误";
				return;
			}
			nums = Math.sqrt(nums);
			break;
	}
	// 保留6位小数 对精度的一种处理方法
	nums = Math.round(nums * 100000) / 100000;
	inputBox.value = nums;
	getRusult = false;
}

/**
 * [对二元运算符以及（）进行处理]
 * @param  {[str]} opt [输入的二元运算符以及'('')']
 */
function option(opt) {
	if (nums == "输入有误") {
		nums = 0;
		inputBox.value = 0;
		result.pop();
	}
	if (enterOpt && opt != '(' && opt != ')' && result[result.length - 1] != ')') {
		result.pop();
		result.push(opt);
		equalBox.value = equalBox.value.substring(0, equalBox.value.length - 1);
		equalBox.value += opt;
		return;
	}
	if (opt != '(' && result[result.length - 1] != ')') {
		result.push(nums);
		equalBox.value += inputBox.value;
	}
	result.push(opt);
	equalBox.value += opt;
	inputBox.value = 0;
	nums = 0;
	enterOpt = true;
}

// 求出结果
function equal() {
	if (result[result.length - 1] != ')')
		result.push(nums);
	toRPolish(result);
	result = [];
	nums = cal(outputArr);
	outputArr = [];
	inputBox.value = nums;
	getRusult = true;

	equalBox.value = '';
}

/**
 * [中缀表达式转为后缀表达式]
 * @param  {[array]} inputArr [输入为中缀表达式]
 */
function toRPolish(inputArr) {
	if (inputArr.length == 0)
		return;
	for (var i = 0; i < inputArr.length; i++) {
		switch (inputArr[i]) {
			case '+':
			case '-':
				getOper(inputArr[i], 1);
				break;
			case '*':
			case '/':
			case '%':
				getOper(inputArr[i], 2);
				break;
			case '(':
				myStack.push('(');
				break;
			case ')':
				getParent(')');
				break;
			default:
				outputArr.push(inputArr[i]);
				break;
		}
	}
	while (myStack.length != 0) {
		outputArr.push(myStack.pop());
	}
}

/**
 * [得到右括号时 找到匹配的左括号]
 * @param  {[string]} ch [只能输入')']
 */
function getParent(ch) {
	while (myStack.length != 0) {
		var chx = myStack.pop();
		if (chx == "(")
			break;
		else
			outputArr.push(chx);
	}
}

/**
 * [对操作符的进栈与出栈做操作]
 * @param  {[string]} ch    [运算符]
 * @param  {[number]} prec1 [优先级顺序]
 */
function getOper(ch, prec1) {
	while (myStack.length != 0) {
		var oprTop = myStack.pop();
		if (oprTop == "(") {
			myStack.push(oprTop);
			break;
		} else {
			var prec2;
			if (oprTop == "+" || oprTop == '-') {
				prec2 = 1;
			} else {
				prec2 = 2;
			}
			if (prec2 < prec1) {
				myStack.push(oprTop);
				break;
			} else {
				outputArr.push(oprTop);
			}
		}
	}
	myStack.push(ch);
}


/**
 * [返回结果]
 * @param  {[array]} ploishArr [输入后缀表达式数组]
 * @return {[number/string]}   [得到最终的结果]
 */
function cal(ploishArr) {
	var stack = [];
	for (var i = 0; i < ploishArr.length; i++) {
		if (!isNaN(ploishArr[i])) {
			stack.push(ploishArr[i]);
		} else {
			var temp = stack.pop();
			switch (ploishArr[i]) {
				case '+':
					stack.push(stack.pop() + temp);
					break;
				case '-':
					stack.push(stack.pop() - temp);
					break;
				case '*':
					stack.push(stack.pop() * temp);
					break;
				case '/':
					stack.push(stack.pop() / temp);
					if (temp == 0) {
						return ("输入有误");
					}
					break;
				case '%':
					stack.push(stack.pop() % temp);
					break;
				default:
					break;
			}
		}
	}
	if (isNaN(stack[0]))
		return ("输入有误");
	else
		return (stack[0]);
}