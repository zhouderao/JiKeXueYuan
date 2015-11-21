var express = require('express');
var router = express.Router();
var mysql = require('mysql');
var orm = require('orm');
var dbs = require('../dbs/dbs')(router);

router.get('/', function(req, res) {
    res.render('index', {
        name: '请先登录'
    });
});

router.post('/select', dbs.selectData, function(req, res) {
    res.send(res.locals.NewsInfo);
});

/* 到显示手机页面的主页 */
router.get('/shownews', function(req, res, next) {
    res.render('shownews');
});


/* 到达登录界面 */
router.get('/login', function(req, res) {
    res.render('login', {
        tips: "请输入帐号密码"
    });
});
// 简单的验证账户密码
router.post('/login', function(req, res) {
    if (req.body.name == 'root' && req.body.password == '') {
        res.json({
            success: 1
        });
        res.render('index', {
            name: 'root'
        });
    } else {
        res.json({
            success: 0
        });
    }
});

// 通过post查询并返回数据
router.post('/update', dbs.updateData, function(req, res) {
    res.send(res.locals.NewsInfo);
});

// 查询功能的实现
router.post('/insert', dbs.insertData, function(req, res) {
    res.send(res.locals.NewsInfo);
});

// 通过post查询并返回数据
router.post('/delete', dbs.deleteData, function(req, res) {
    res.send(res.locals.NewsInfo);
});

module.exports = router;
