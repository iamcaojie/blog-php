# 个人博客

## 使用其他技术重构，停止开发。。。

## 简介
* 基于ThinkPHP5.0.24开发
* 前台(基于BootStrap的开发的响应式布局，包含首页，目录页，搜索结果页，文章详情页，个人中心页)
* 后台(基于Layui的单页面管理，包含无限级分类，Rbac权限管理以及网站各种数据的增删改查操作等)
* 用户(留言，注册登录，找回密码，个人中心，资料修改，发布编辑收藏文章，互粉功能，发布评论，发布回复等)

## 安装
* 初始化
    * 直接访问/static/install.php初始化数据库，需要安装mysqli,PDO,gd,redis,openssl,curl扩展
    * 完成后删除install.php和install.sql
* 表情包管理
    * 本地运行/static/img/bqb/getWeiboEmoji.py可以直接下载微博最新表情包
    * 本地运行/static/img/bqb/getEmojiUrlJson.py会根据当前文件下的表情包文件生成前端wangEditor调用的表情json文件
* 修改权限
    * chmod -R 777 /uploads
    * chmod -R 777 /phpapp/runtime


