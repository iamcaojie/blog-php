<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\server\nginx\html/phpapp/application/blog\view\contents\contents.html";i:1544965445;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>博客目录</title>
        <meta charset="utf-8">
        <meta name="author" content="caojie">
        <meta name="description" content="个人博客" />
        <meta name="keywords" content="个人博客" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="renderer" content="webkit" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link href="/static/css/Normalize.css" rel="stylesheet"></link>
        <link href="/static/layui/css/layui.css" rel="stylesheet"></link>
        <link href="/static/css/bootstrap.css" rel="stylesheet"></link>
        <link href="/static/css/font-awesome.css" rel="stylesheet"></link>
        <link href="/static/css/contents.css" rel="stylesheet"></link>
        <!--[if lt IE 9]>
            <script src="/static/js/html5shiv.js"></script>
            <script src="/static/js/respond.src.js"></script>
        <![endif]-->
    </head>
    <body>
        <noscript>抱歉，你的浏览器不支持 JavaScript，访问可能出现错误!</noscript>
        <h1><a href="https://www.python.org/">Python</a></h1>
        <ol class="breadcrumb">
            <li><a href="http://localhost">首页</a></li>
            <li class="active">Python</li>
            <!-- <li class="active">Data</li> -->
        </ol>
        <div class="container">
            <div class="row">
                <?php if(is_array($bloglist) || $bloglist instanceof \think\Collection || $bloglist instanceof \think\Paginator): $i = 0; $__LIST__ = $bloglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$blogdata): $mod = ($i % 2 );++$i;?>
                    <div class="col-sm-12 col-md-12">
                    <div class="article-list">
                        <div class="img-Placeholder">
                            <a href="/blog/python/detail/id/<?php echo $blogdata['id']; ?>.html"><img src="/static/img/python.jpg"/></a>
                        </div>
                        <div class="article">
                            <div class="article-title"><h2><a href="/blog/python/detail/id/<?php echo $blogdata['id']; ?>.html"><?php echo $blogdata['blog_title']; ?></a></h2></div>
                            <div class="article-information">
                            <?php if(is_array($blogdata['tag']) || $blogdata['tag'] instanceof \think\Collection || $blogdata['tag'] instanceof \think\Paginator): $i = 0; $__LIST__ = $blogdata['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                                  <span> <?php echo $tag; ?></span>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <span><?php echo $blogdata['update_time']; ?></span>
                            </div>
                            <div class="article-text"><?php echo $blogdata['blog_text']; ?></div>
                        </div>
                    </div>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <nav aria-label="Page navigation">
            <div class="page-box">
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="/blog/python?page=1">1</a></li>
                <li class="active"><a href="/blog/python?page=2">2</a></li>
                <li><a href="/blog/python?page=3">3</a></li>
                <li><a href="/blog/python?page=4">4</a></li>
                <li><a href="/blog/python?page=5">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </div>
        </nav>
        <script src="/static/js/jquery3.3.1.js"></script>
        <script src="/static/js/bootstrap.js"></script>
        <script src="/static/layui/layui.js"></script>
        <script src="/static/js/toTop.js"></script>
        <script src="/static/js/contents.js"></script>
    </body>
</html>