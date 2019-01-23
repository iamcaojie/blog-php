<?php
namespace app\db\controller;

use think\View;
use think\Request;
use think\Db;
class Index
{
    public function index()
    {
        // 初始化数据库
        print_r(Db::query('show tables'));

        echo '初始化数据库...<br>';

        $ddlsql = [
            // 网站状态表
            'create table think_web(id int(10) AUTO_INCREMENT, name varchar(10), status varchar(10), domain varchar(50),create_time int(11),update_time int(11),delete_time int(11),primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8',
            // 网站信息表
            'create table think_info(id int(10) AUTO_INCREMENT, name varchar(10),create_time int(11),update_time int(11),delete_time int(11),primary key(id)) DEFAULT CHARSET=utf8',
            // 网站用户表
            'create table think_users(id int(10) AUTO_INCREMENT, username varchar(10), password varchar(10),permission int(10),create_time int(11),update_time int(11),delete_time int(11),primary key(id)) DEFAULT CHARSET=utf8',
            // 博客文章表(n)(cate_id) -- 博客分类表(1)
            'create table think_blog(id int(10) AUTO_INCREMENT, blog_title varchar(30), cate_id int(10), blog_html text(10000), blog_text text(10000),create_time int(11),update_time int(11),delete_time int(11),read_count int(10) default 0,primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8',
            // 博客分类表(1) -- 博客文章表(n)
            'create table think_cate(id int(10) AUTO_INCREMENT, blog_category varchar(10), create_time int(11), update_time int(11), delete_time int(11),primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8',
            // 博客标签表(n) -- 博客文章表(n)
            'create table think_tags(id int(10) AUTO_INCREMENT, tag varchar(10), create_time int(11), update_time int(11), delete_time int(11),primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8',
            // 中间表  博客标签表(n)(blog_id) -- 博客文章表(n)(tag_id)
            'create table think_blogs_tags(id int(10) AUTO_INCREMENT, tag_id int(10), blog_id int(10), create_time int(11), update_time int(11), delete_time int(11), primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8',
            // 链接表(n) -- 链接分类表(1)
            'create table think_links(id int(10) AUTO_INCREMENT, link_cate int(10), name varchar(10), link varchar(200), create_time int(11), update_time int(11),delete_time int(11),primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8', 
            // 链接分类表(1) -- 链接表(n)
            'create table think_linkcate(id int(10) AUTO_INCREMENT, name varchar(10), create_time int(11), update_time int(11),delete_time int(11),primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8',
            // 留言表
            'create table think_massage(id int(10) AUTO_INCREMENT, massage_title'
            . ' varchar(10), massage_text varchar(100) , contact varchar(50) ,'
            . 'create_time int(11),update_time int(11),delete_time int(11),'
            . 'primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8',
            // 评论表(n)(blog_id) -- 博客文章表(1)
            'create table think_comments(id int(10) AUTO_INCREMENT, user_id int(10), blog_id int(10), comment_text varchar(100),create_time int(11),update_time int(11),delete_time int(11), primary key(id)) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8',
        ];
        
        $dmlsql = [
            'insert into think_web(id, name, status, domain) values (1,"blog","on","iamcaojie.com")',
            'insert into think_users(id,username,password,permission) values (1,"caojie","caojie",0)',
            'insert into think_blog(id, blog_title, cate_id, delete_time) values (1, "临时缓存内容", 1, 1)',
            'insert into think_cate(id, blog_category) values (1,"无"),(2,"Python"),(3,"PHP"),(4,"Java")',
            'insert into think_tags(id, tag) values (1,"原创"),(2,"转载"),(3,"基础"),(4,"技巧"),(5,"重点"),(6,"难点")',
            'insert into think_linkcate(id, name) values (1,"主页链接"),(2,"文档链接"),(3,"友情链接")'
        ];
        foreach ($ddlsql as $value)
        {
           Db::execute($value); 
        }
        echo '数据库初始化完成...<br>';
        foreach ($dmlsql as $value)
        {
           Db::execute($value); 
        }
        echo '完成';
    }
}
