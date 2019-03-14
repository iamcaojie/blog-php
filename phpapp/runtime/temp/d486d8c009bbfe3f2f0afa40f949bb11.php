<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\server\nginx\html/phpapp/application/admin\view\admin\admin.html";i:1552569303;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>管理后台</title>
        <meta charset="utf-8">
        <meta name="author" content="caojie">
        <meta name="description" content="个人博客" />
        <meta name="keywords" content="个人博客" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="renderer" content="webkit" />
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> -->
        <link href="/static/css/Normalize.css" rel="stylesheet"></link>
        <link href="/static/layui/css/layui.css" rel="stylesheet"></link>
        <!-- <link href="/static/css/bootstrap.css" rel="stylesheet"></link> -->
        <link href="/static/css/font-awesome.css" rel="stylesheet"></link>
         <link href="/static/css/admin.css" rel="stylesheet"></link>
    </head>
    <body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
      <div class="layui-header">
        <div class="layui-logo">博客后台</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="http://<?php echo $webdata['domain']; ?>">网站首页</a></li>
            <li class="layui-nav-item"><a href="/user">用户后台</a></li>
            <li class="layui-nav-item"><a href="https://iamcaojie.github.io" target="_blank">流量统计</a></li>
            <li class="layui-nav-item"><a href="javascript:void(0);">用户管理</a></li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="/static/img/avatar.jpg" class="layui-nav-img">
                    <?php echo $username; ?>
                </a>
                <dl class="layui-nav-child">
                  <dd><a href="">基本资料</a></dd>
                </dl>
            </li>
          <li class="layui-nav-item"><a href="/login/index/loginoff">安全退出</a></li>
        </ul>
      </div>
      <div class="layui-side layui-bg-black" >
          <div class="layui-side-scroll" >音乐播放</div>
        <div class="layui-side-scroll" style="display: none;">
          <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
          <ul class="layui-nav layui-nav-tree">
            <li class="layui-nav-item layui-nav-itemed">
              <a class="" href="javascript:;">网站管理</a>
              <dl class="layui-nav-child">
                <dd><a href="javascript:;" >状态设置</a></dd>
                <dd><a href="javascript:;" >信息设置</a></dd>
                <dd><a href="javascript:;">下载设置</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item">
              <a href="javascript:;">博客管理</a>
              <dl class="layui-nav-child">
                <dd><a id="createblog" href="javascript:;">发布文章</a></dd>
                <dd><a href="javascript:;">文章列表</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item">
              <a class="" href="javascript:;">链接管理</a>
              <dl class="layui-nav-child">
                <dd><a href="javascript:;">发布链接</a></dd>
                <dd><a href="javascript:;">链接列表</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item">
              <a href="javascript:;">留言管理</a>
              <dl class="layui-nav-child">
                <dd><a href="javascript:;">留言列表</a></dd>
                <dd><a href="javascript:;">评论管理</a></dd>
                <!-- <dd><a href="">超链接</a></dd> -->
              </dl>
            </li>
            <li class="layui-nav-item">
              <a href="javascript:;">数据管理</a>
              <dl class="layui-nav-child">
                <dd><a href="javascript:;">数据库信息</a></dd>
                <dd><a href="javascript:;">数据导出</a></dd>
                <dd><a href="javascript:;">数据查询</a></dd>
                <dd><a href="javascript:;">相册管理</a></dd>
                <dd><a href="javascript:;">回收站</a></dd>
                <!-- <dd><a href="">超链接</a></dd> -->
              </dl>
            </li>
            <!-- <li class="layui-nav-item"><a href="">云市场</a></li> -->
            <!-- <li class="layui-nav-item"><a href="">发布商品</a></li> -->
          </ul>
        </div>
      </div>
      
      <div class="layui-body">
        <!-- 内容主体区域 -->
        <div id="container" style="padding: 15px;">
            <div class="layui-tab" lay-filter="tab-list">
                <ul class="layui-tab-title">
                    <li class="layui-this" lay-id="zhuangtai">状态设置</li>
                    <li lay-id="xinxi">信息设置</li>
                    <li lay-id="xiazai">下载设置</li>
                    <li lay-id="fabuwenzhang">发布文章</li>
                    <li lay-id="wenzhang">文章列表</li>
                    <li lay-id="fabulianjie">发布链接</li>
                    <li lay-id="lianjie">链接列表</li>
                    <li lay-id="liuyan">留言列表</li>
                    <li lay-id="pinlun">评论管理</li>
                    <li lay-id="xiangceguanli">相册管理</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <!-- 网站设置-状态设置 -->
                        <div id="web-status-tab">
                            <form class="layui-form" id="web-status-form">
                                <div class="layui-form-item" id="web-switch">
                                    <label class="layui-form-label">是否开启</label>
                                    <div class="layui-input-block">
                                        <input type="checkbox" lay-filter="web-status" id="switch" checked name="switch" lay-skin="switch" lay-text="开启|关闭">
                                    </div>
                                </div>
                            </form>
                            <div id="close-web" style="display: none;">
                                <div>关闭网站时对外显示的内容(或html页面)</div>
                                <form>
                                    <textarea id="close-info-data" class="layui-input" style="min-height: 100px;max-height: 200px;padding:5px;resize: vertical;"><?php echo $webdata["close_info"]; ?></textarea>
                                    <br>
                                    <button class="layui-btn" id="close-info">提交</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <!-- 网站设置-信息设置 -->
                        <div id="web-info-tab">
                            <form class="layui-form" id="web-info-form">
                                <div class="layui-form-item" id="web-info">
                                    <label class="layui-form-label">域名设置</label>
                                    <div class="layui-input-block">
                                        <input name="domain" type="text" value="<?php echo $webdata['domain']; ?>" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                <label class="layui-form-label">ip设置</label>
                                <div class="layui-input-block">
                                    <input name="ipset" type="text" value="<?php echo $webdata['ip']; ?>" class="layui-input">
                                </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">备案号设置</label>
                                    <div class="layui-input-block">
                                        <input name="beian" type="text" value="<?php echo $webdata['beian_code']; ?>" class="layui-input">
                                    </div>
                                </div>
                                <button class="layui-btn" id="info-btn">提交</button>
                            </form>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">轮播设置</label>
                                    <div class="layui-input-block">
                                        <div class="layui-upload">
                                            <button type="button" class="layui-btn" id="imguploadbtn">轮播图上传</button><input class="layui-upload-file" type="file" accept="undefined" name="file" multiple="">
                                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                                预览图：
                                                <div class="layui-upload-list" id="img-list"></div>
                                            </blockquote>
                                            <a class="layui-btn" id="uploadaction">开始上传</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div>开发中</div>
                    </div>
                    <div class="layui-tab-item">
                        <div id="create-blog-tab">
                        <div>发布笔记</div>
                        <form class="layui-form">
                          <div class="layui-form-item">
                            <input name="id" value="">
                            <label class="layui-form-label">标题</label>
                            <div class="layui-input-block">
                              <input type="text" name="blog_title" placeholder="请输入标题" autocomplete="off" class="layui-input"/>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">个性标签</label>
                            <div class="layui-input-block">
                                <input type="text" name="unique_tag" class="layui-input" placeholder="请输入此文章的个性标签，以“,”分隔"/>
                            </div>
                        </div>
                          <div class="layui-form-item">  
                        <label class="layui-form-label">笔记分类</label>
                        <div class="layui-input-block">
                            <?php if(is_array($catelist) || $catelist instanceof \think\Collection || $catelist instanceof \think\Paginator): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;if($cate["blog_category"] == "无"): ?>
                                 <input type="radio" lay-filter="blog-category" name="blog-category" value="<?php echo $cate['id']; ?>" title="<?php echo $cate['blog_category']; ?>" checked>
                             <?php else: if($cate['id'] == '6'): ?><br><?php endif; ?>
                                 <input type="radio" lay-filter="blog-category" name="blog-category" value="<?php echo $cate['id']; ?>" title="<?php echo $cate['blog_category']; ?>">
                             <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            <div><a id="manage-classification" href="javascript:;">分类管理</a></div>
                        </div>
                        </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">选择标签</label>
                                <div class="layui-input-block">
                                    <input type="radio" lay-filter="tag-origin" name="tag-origin" value="1" title="原创">
                                    <input type="radio" lay-filter="tag-origin" name="tag-origin" value="2" title="转载" checked>
                                </div>
                                <div class="layui-input-block">
                                    <input type="radio" lay-filter="tag-level" name="tag-level" value="3" title="基础" checked>
                                    <input type="radio" lay-filter="tag-level" name="tag-level" value="4" title="技巧" >
                                    <input type="radio" lay-filter="tag-level" name="tag-level" value="5" title="重点">
                                    <input type="radio" lay-filter="tag-level" name="tag-level" value="6" title="难点">
                                </div>
                            </div>
                            <div>
                                <div id="editor-box">
                                    <div id="editor"></div>
                                </div>
                            </div>
                            <button class="layui-btn" id="btn1">编辑html数据</button>
                            <button class="layui-btn" id="btn2">获取text数据</button>
                            <button class="layui-btn" id="btn3">提交</button>
                            <button class="layui-btn" id="btn4" style="display:none">确认修改</button>
                        </form>
                        </div>
                    </div>

                    <div class="layui-tab-item">
                        <!-- 博客管理-文章列表 -->
                        <div id="bloglist-tab">
                            <div>文章列表</div>
                            <table id="article" class="layui-table" lay-filter="article"></table>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <!-- 网站设置-发布链接 -->
                        <div id="create-links-tab">
                            <div>发布链接</div>
                            <form class="layui-form">
                                <div class="layui-form-item">
                                    <input name="link_id" value="">
                                    <label class="layui-form-label">链接主题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="link_title" placeholder="请输入链接主题" class="layui-input"/>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">链接分类</label>
                                    <div class="layui-input-block">
                                        <?php if(is_array($linkcatelist) || $linkcatelist instanceof \think\Collection || $linkcatelist instanceof \think\Paginator): $i = 0; $__LIST__ = $linkcatelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$linkcate): $mod = ($i % 2 );++$i;?>
                                        <input type="radio" lay-filter="blog-category" name="link_cate" value="<?php echo $linkcate['id']; ?>" title="<?php echo $linkcate['link_cate_title']; ?>">
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">链接地址</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="link_address" placeholder="请输入链接地址" class="layui-input"/>
                                    </div>
                                </div>
                                <button class="layui-btn" id="btn5">提交</button>
                                <button class="layui-btn" id="btn6" style="display:none">确认修改</button>
                            </form>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <!-- 网站设置-链接列表 -->
                        <div id="links-tab">
                            <div>链接列表</div>
                            <table id="links" class="layui-table" lay-filter="links"></table>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <!-- 留言管理-留言列表 -->
                        <div id="massagelist-tab">
                            <div>留言列表</div>
                            <table id="massage-list" class="layui-table"></table>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <!-- 留言管理-评论管理 -->
                        <div id="commentlist-tab">
                            <div>评论列表</div>
                            <table id="comment-list" class="layui-table" lay-filter="comments"></table>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <!-- 留言管理-相册管理 -->
                        <div id="commentlist-tab">
                            <div>相册管理（轮播，主题图，页内图）</div>
                            <div><a>获取所有图片</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 底部固定区域 -->
            <div class="layui-footer">
                 今日访问量：<?php echo $webdata['today_views']; ?>  累计访问量：<?php echo $webdata['all_views']; ?>  当前ip：<?php echo $ip; ?>
            </div>
    </div>
    <script type="text/html" id="bar">
        <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
    <script src="/static/js/jquery3.3.1.js"></script>
    <!-- <script src="/static/js/bootstrap.js"></script> -->
    <script src="/static/layui/layui.js"></script>
    <script src="/static/js/wangEditor.js"></script>
    <script src="/static/js/toTop.js"></script>
    <script src="/static/js/admin.js"></script>
    </body>
</html>