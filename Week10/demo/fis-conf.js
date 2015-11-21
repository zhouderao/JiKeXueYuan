// 加 md5 及_ad3adf1等样式的后缀
fis.match('*.{js,css,png,gif,jpg}', {
  useHash: true
});

// 启用 fis-spriter-csssprites 插件 
fis.match('::packager', {
  spriter: fis.plugin('csssprites')
});

// 寻找js并将其定位
fis.match('*.js', {
  optimizer: fis.plugin('uglify-js'),
  release: '/static/js/$0'
});

// 寻找特定的单个文件  优先级最高
fis.match('jquery-2.1.4.min.js', {
  optimizer: fis.plugin('uglify-js'),
  release: '/static/js/jquery.js'
});

// 对 CSS 进行图片合并
fis.match('*.css', {
  useSprite: true,
  optimizer: fis.plugin('clean-css'),
  release: '/static/css/$0'
});

// 转移imgag文件夹下的文件至指定位置
fis.match('image/*', {
  release: '/static/$0'
});

// png图片的压缩
fis.match('*.png', {
  optimizer: fis.plugin('png-compressor')
});
