1）本周采用的语言是PHP
2）本次作业根据上次的不足更改了配置文件，对数据库连接以及数据处理做了较大的改动;
3）进入管理页面打开新闻后台管理即可对数据进行操作;
4）点击相关网站选择新闻界面即可进入手机页面;

防御部分：
5）web安全预防文件在php文件夹里面，xss-safe.php对应xss防御
6）使用php的PHP PDO prepare()、execute()和bindParam()方法防止mysqlxss注入
7）dataHandle.php以及login.php用cookie实现csrf的防御 这个没有去尝试是否正确

