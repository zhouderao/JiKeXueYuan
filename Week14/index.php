<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <title>后台管理界面</title>
    <!-- 注意这些的顺序  css顺序相反就无法修改 -->
    <link rel="stylesheet" type="text/css" href="./stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="./stylesheets/mystyle.css">
</head>

<body>
    <!-- SCRF防御 -->
    <?php 
        $value = 'DefenseSCRF';
        setcookie('cookie', $value, time()+3600);
        $hash = md5($_COOKIE['cookie']);
     ?>
    <input type="hidden" id="hash" value="<?=$hash;?>">

    <!-- 导航条 可以参照boostrap官网-->
    <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
            <!-- 品牌与切换组合得到更好的移动显示 -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                </a>
            </div>
            <!-- 收集的导航链接，表格，以及切换等内容 -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">新闻管理<span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">相关网站 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="shownews.php">新闻界面</a></li>
                            <li><a href="login.php">登录界面</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="搜索">
                    </div>
                    <button type="submit" class="btn btn-default">查找</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">返回</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户:周饶
                         <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">设置</a></li>
                            <li><a href="#">查找</a></li>
                            <li><a href="#">更改</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- 栅格系统 -->
    <div class="container-fluid">
        <div class="row">
            <!-- 左侧的导航栏 -->
            <div class="col-md-2">
                <ul id="main-nav" class="main-nav nav nav-tabs nav-stacked" style="">
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-th-large"></i> 首页
                        </a>
                    </li>
                    <li>
                        <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-cog"></i>新闻后台管理
                            <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="systemSetting" class="nav nav-list secondmenu collapse" style="height: 0px;">
                            <li class="click-data" value="recom"><a href="#"><i class="glyphicon glyphicon-user"></i>推荐</a></li>
                            <li class="click-data" value="baijia"><a href="#"><i class="glyphicon glyphicon-th-list"></i>百家</a></li>
                            <li class="click-data" value="local"><a href="#"><i class="glyphicon glyphicon-asterisk"></i>本地</a></li>
                            <li class="click-data" value="img"><a href="#"><i class="glyphicon glyphicon-edit"></i>图片</a></li>
                            <li class="click-data" value="fun"><a href="#"><i class="glyphicon glyphicon-eye-open"></i>娱乐</a></li>
                            <li class="click-data" value="society"><a href="#"><i class="glyphicon glyphicon-eye-open"></i>社会</a></li>
                            <li class="click-data" value="army"><a href="#"><i class="glyphicon glyphicon-eye-open"></i>军事</a></li>
                            <li class="click-data" value="tech"><a href="#"><i class="glyphicon glyphicon-eye-open"></i>科技</a></li>
                            <li class="click-data" value="net"><a href="#"><i class="glyphicon glyphicon-eye-open"></i>互联网</a></li>
                            <li class="click-data" value="women"><a href="#"><i class="glyphicon glyphicon-eye-open"></i>女人</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-fire"></i>关于系统
                        </a>
                    </li>
                </ul>
            </div>
            <!-- 右侧表格系统 -->
            <div class="col-md-10">
                <h4 id="location">首页</h4>
                <input type='button' id="addBtn-face" class='float-right btn btn-info' value='添加'>
                <hr/>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>时间</th>
                            <th>图片</th>
                            <th>内容</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                    </tbody>
                </table>
            </div>
        </div>
        <div id="modify">
        </div>
        <div id="delete">
            <label id="info"></label>
            <input type='button' id="deleteBtn" class='btn btn-danger' value='确定'>
            <input type='button' id="cancelBtn" class='btn btn-info' value='取消'>
        </div>
        <div id="add">
            <h5>新闻标题：</h5>
            <input type='text' class='full-width' id="newsTitle">
            <h5>图片路径：</h5>
            <input type='text' class='full-width' id="newImg">
            <h5>新闻内容：</h5>
            <textarea class='full-width news-content' id='newsContent'></textarea>
            <input type='date'  id="addTime">
            <label id="addInfo">输入信息</label>
            <input type='button' id="addSave" class='float-right btn btn-info'value='保存'>
            <input type='button' id="addCancel" class='float-right btn btn-info' value='取消'>
        </div>
    </div>
    <script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
</body>

</html>
