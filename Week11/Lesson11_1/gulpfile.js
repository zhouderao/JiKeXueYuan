var gulp = require('gulp');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer-core');
var mqpacker = require('css-mqpacker');
var csswring = require('csswring');
var less = require('gulp-less');
concat = require('gulp-concat');
uglify = require('gulp-uglify');
rename = require('gulp-rename');
// 默认执行的程序
gulp.task('default', function() {
    gulp.start('less', 'js', 'jQuery','html','images');
});
// less编译与压缩
gulp.task('less', function() {
	// 包含CSS的自动填充
    var processors = [
        autoprefixer({
            browsers: ['last 4 version']
        }),
        mqpacker,
        csswring
    ];

    return gulp.src('./src/style/common.less')
        .pipe(less())
        .pipe(postcss(processors))
        .pipe(gulp.dest('./dest/style'));
});
// 手写的js的压缩
gulp.task('js', function() {
    return gulp.src('src/js/index.js')
        .pipe(uglify()) //压缩
        .pipe(gulp.dest('dest/js')); //输出
});
// jQuery的转移
gulp.task('jQuery', function() {
    return gulp.src('src/js/jquery-2.1.4.min.js')
        .pipe(uglify()) //压缩
        .pipe(gulp.dest('dest/js/')); //输出
});
// html页面的转移
gulp.task('html', function() {
    return gulp.src('src/index.html')
        .pipe(gulp.dest('dest/')); //输出
});
// 图片的转移
gulp.task('images', function() {
    return gulp.src('src/images/*')
        .pipe(gulp.dest('dest/images/')); //输出
});
