<!DOCTYPE html>
<html lang="ch">

<head>
    <meta charset="UTF-8">
    <title>登录界面</title>
    <link rel="stylesheet" href="./stylesheets/login.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/bootstrap.min.css">
</head>

<body>
    <!-- SCRF防御 -->
    <?php 
        $value = 'DefenseSCRF';
        setcookie('cookie', $value, time()+3600);
        $hash = md5($_COOKIE['cookie']);
     ?>
    <input type="hidden" id="hash" value="<?=$hash;?>">
    <div class="container">
        <div id="row" class="row">
            <div class="input-group password">
                <span class="input-group-addon" id="basic-addon1">
					<img src="./images/head.png">
                </span>
                <input type="text"  class="form-control changeh" placeholder="用户名/手机/邮箱" id="user" value='' aria-describedby="basic-addon1">
            </div>
            <div class="input-group password">
                <span class="input-group-addon" id="basic-addon1">
					<img src="./images/lock.png">
                </span>
                <input type="password" id="password" class="form-control changeh" placeholder="密码" value='' aria-describedby="basic-addon1">
            </div>
            <div>
                <input type="checkbox" checked="checked">
                <label>下次自助登录</label>
                <a class="right" href="#">忘记密码？</a>
            </div>
            <div>
                <button type="button" class="btn-danger" id="submit">登录</button>
            </div>
            <div class="account">
                <a class="right" href="#">立即注册</a>
            </div>
            <div class="middle">
                <label>使用已有社交帐号登录</label>
            </div>
            <div class="middle bottom">
                <a href=""><img src="./images/qq.png"></a>
                <a href=""><img src="./images/weixin.png"></a>
                <a href=""><img src="./images/weibo.png"></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="./js/login.js"></script>

</html>
