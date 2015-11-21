/**
 * 遇到的错误：
 * 1）top和bottom不能作为变量使用
 * 2)在for循环中的var也在函数的局部作用域中
 * 全局变量的定义
 * @param  {[number]} selectIndx [下拉菜单所选的索引数，注意是从0开始的]
 * @param  {[DOM中的对象]} wrapper [整个布局的盒子]
 * @param  {[DOM中的对象]} topClient [最上层设置的盒子]
 * @param  {[DOM中的对象]} bottomClient [最下层信息栏的盒子]
 * @param  {[DOM中的对象]} greens [类名green的绿色标签的链接的集合]
 * @param  {[DOM中的对象]} oranges [类名orange的绿色标签的链接的集合]
 */

var selectIndx = 0;
var wrapper;
var topClient;
var bottomClient;
var greens;
var oranges;

// 当文档加载完后执行函数获取所对应的参数
window.onload = function() {
	wrapper = document.getElementById('wrapper');
	topClient = document.getElementById('top');
	bottomClient = document.getElementById('bottom');
	greens = document.getElementsByClassName('green');
	oranges = document.getElementsByClassName('orange');
	wrapper.style.background = localStorage.wrapper;
	topClient.style.background = localStorage.topClient;
	bottomClient.style.background = localStorage.bottomClient;
	for (var i = 0; i < oranges.length; i++) {
		oranges[i].style.color = localStorage.colorLinks;
	};
	for (i = 0; i < greens.length; i++) {
		greens[i].style.color = localStorage.colorLinks;
	};
};

// 展开和闭合顶部的设置信息
function showTop() {
	var a = topClient.style.display;
	if (a == "none") {
		topClient.style.display = "block";
	} else {
		topClient.style.display = "none";
	}
}

// 当下拉列表选择发生变化时，改变所选参数的值
function selectChange() {
	selectIndx = document.getElementById('roleId').selectedIndex;
}

/**
 * [改变所选的对象的背景颜色或字体颜色 并保存值localstorage中]
 * @param  {[string]} color [对应按钮的颜色]
 */
function changeColor(color) {
	switch (selectIndx) {
		case 0:
			wrapper.style.background = color;
			localStorage.wrapper = color;
			break;
		case 1:
			topClient.style.background = color;
			localStorage.topClient = color;
			break;
		case 2:
			bottomClient.style.background = color;
			localStorage.bottomClient = color;
			break;
		case 3:
			for (var i = 0; i < greens.length; i++) {
				greens[i].style.color = color;
			};
			for (i = 0; i < oranges.length; i++) {
				oranges[i].style.color = color;
			};
			localStorage.colorLinks = color;
			break;
		default:
			break;
	}
}