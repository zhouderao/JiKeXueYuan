// 加载时焦点到input type=“text”
function getFocus () {
	document.getElementById("kw").focus();
}
// 显示更多产品 代码有缺陷 鼠标不能离开更多产品
function showPro() {
    var pro = document.getElementById("morepro");
    pro.style.display = "block";
}
// 隐藏更多产品
function hidePro() {
    var pro = document.getElementById("morepro");
    pro.style.display = "none";
}
// 显示设置 代码有缺陷 鼠标不能离开设置
function showSetting() {
    var pro = document.getElementById("setting");
    pro.style.display = "block";
}
// 隐藏设置
function hideSetting() {
    var pro = document.getElementById("setting");
    pro.style.display = "none";
}
// 文本输入框是焦点时 承载的span标签变色
function blueBorder(){
    var pro = document.getElementById("txtspn");
    pro.style.border = "1px solid #2d78f4";
}
// 文本输入框失去焦点时 承载的span标签变色
function grayBorder(){
    var pro = document.getElementById("txtspn");
    pro.style.border = "1px solid #b6b6b6";
}