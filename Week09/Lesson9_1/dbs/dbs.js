var express = require('express');
var orm = require('orm');

// 服务器的配置
var dbusername = 'root';
var dbpassword = '';
var dbname = 'baidunews';

// 导入到路由
module.exports = function(router) {

    // 数据库设置
    router.use(orm.express("mysql://" + dbusername + ":" + dbpassword + "@localhost/" + dbname, {
        define: function(db, models, next) {

            models.NewsInfo = db.define("NewsInfo", {
                id: Number,
                title: String,
                img: String,
                content: String,
                time: Date,
                classfy: ["recom", "baijia", "local", "img", "fun",
                    "society", "army", "tech", "net", "women"
                ]
            });
            next();
        }
    }));

    // 数据库操作
    var dbs = {

        // 插入数据
        insertData: function(req, res, next) {
            req.models.NewsInfo.create({
                title: req.body.title,
                img: req.body.img,
                content: req.body.content,
                time: req.body.time,
                classfy: req.body.classfy
            }, function(err, NewsInfo) {
                if (err)
                    return console.error('Connection error: ' + err);
                res.locals.NewsInfo = {
                    'result': "成功插入了"
                };
                next();
            });
        },

        // 删除数据
        deleteData: function(req, res, next) {
            req.models.NewsInfo.find({
                id: req.body.id
            }, function(err, NewsInfo) {
                if (err)
                    return console.error('Connection error: ' + err);

                NewsInfo[0].remove(function(err) {
                    if (err)
                        return console.error('Connection error: ' + err);
                    res.locals.NewsInfo = {
                        'result': "数据删除成功"
                    };
                    next();
                });
            });
        },

        // 修改数据
        updateData: function(req, res, next) {
            console.log(req.body);
            req.models.NewsInfo.find({
                id: req.body.id
            }, function(err, NewsInfo) {
                if (err)
                    return console.error('Connection error: ' + err);

                NewsInfo[0].title = req.body.title;
                NewsInfo[0].img = req.body.img;
                NewsInfo[0].content = req.body.content;
                NewsInfo[0].time = req.body.time;

                NewsInfo[0].save(function(err) {
                    if (err)
                        return console.error('Connection error: ' + err);
                    res.locals.NewsInfo = {
                        'result': "数据修改成功"
                    };
                    next();
                });
            });
        },

        // 通过传送不同的id和classfy来达到查询数据
        selectData: function(req, res, next) {
            var seletejson;

            if (req.body.id == undefined) {
                seletejson = {
                    classfy: req.body.classfy
                };
            } else {
                seletejson = {
                    id: req.body.id
                };
            }

            req.models.NewsInfo.find(seletejson, function(err, NewsInfo) {
                if (err)
                    return console.error('Connection error: ' + err);
                res.locals.NewsInfo = NewsInfo;
                next();
            });
        }
    };

    return dbs;
}
