<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\server\nginx\html/phpapp/application/admin\view\auth\auth.html";i:1553172300;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>用户权限管理</title>
        <meta charset="utf-8">
        <meta name="author" content="caojie">
        <meta name="description" content="个人博客" />
        <meta name="keywords" content="个人博客" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="renderer" content="webkit" />
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> -->
        <link href="/static/css/Normalize.css" rel="stylesheet"></link>
        <link href="/static/layui/css/layui.css" rel="stylesheet"></link>
         <!--<link href="/static/css/bootstrap.css" rel="stylesheet"></link>-->
        <!--<link href="/static/css/font-awesome.css" rel="stylesheet"></link>-->
        <link href="/static/css/auth.css" rel="stylesheet"></link>
    </head>
    <body>
        <div class="layui-tab layui-tab-brief" lay-filter="cate-manage">
            <ul class="layui-tab-title">
                <li class="layui-this">添加权限</li>
                <li>查看权限</li>
                <li>添加用户组</li>
                <li>查看用户组</li>
                <li>添加用户</li>
                <li>查看用户</li>
            </ul>
            <div class="layui-tab-content">
                <!--添加权限-->
                <div class="layui-tab-item layui-show">
                    <div id="add-auth">
                        <form id="add-auth-form" class="layui-form" action="/admin/auth/addauthrule" method="post">
                            <div class="layui-input-block">
                                <label class="layui-form-label">上级权限</label>
                                <div class="layui-inline">
                                    <select name="pid">
                                        <option value="0">顶级权限</option>
                                        <?php if(is_array($authrules) || $authrules instanceof \think\Collection || $authrules instanceof \think\Paginator): $i = 0; $__LIST__ = $authrules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authrule): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $authrule['id']; ?>"><?php echo $authrule['title']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-input-block">
                                <label class="layui-form-label">权限名称</label>
                                <div class="layui-inline">
                                    <input name="title" class="layui-input" autocomplete="off" placeholder="必填"/>
                                </div>
                            </div>
                            <div class="layui-input-block">
                                <label class="layui-form-label">权限标识</label>
                                <div class="layui-inline">
                                    <input name="name" class="layui-input" autocomplete="off" placeholder="必填"/>
                                </div>
                            </div>
                            <div class="layui-input-block">
                                <label class="layui-form-label">规则表达式</label>
                                <div class="layui-inline">
                                    <input name="conditions" class="layui-input" autocomplete="off" placeholder="选填"/>
                                </div>
                            </div>
                            <div class="layui-input-block">
                                <label class="layui-form-label">权限状态</label>
                                <div class="layui-inline">
                                    <input type="radio" name="status" value="1" title="启用" checked>
                                    <input type="radio" name="status" value="0" title="关闭">
                                </div>
                            </div>
                            <button id="add-auth-btn" class="layui-btn">添加权限</button>
                        </form>
                    </div>
                </div>
                <!--查看权限-->
                <div class="layui-tab-item">
                    <button id="refresh-auth-btn" class="layui-btn layui-btn-normal layui-btn-sm">重载数据</button>
                    <table id="authbox" class="layui-table" lay-filter="authbox"></table>
                </div>
                <!--添加用户组-->
                <div class="layui-tab-item">
                    <form class="layui-form" >
                    <div class="layui-input-block">
                        <label class="layui-form-label">上级用户组</label>
                        <div class="layui-inline">
                            <select id="group-pid">
                                <option value="0">顶级用户组</option>
                                <?php if(is_array($authgroups) || $authgroups instanceof \think\Collection || $authgroups instanceof \think\Paginator): $i = 0; $__LIST__ = $authgroups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authgroup): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $authgroup['id']; ?>"><?php echo $authgroup['title']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-input-block">
                        <label class="layui-form-label">用户组名称</label>
                        <div class="layui-inline">
                            <input name="group-title" class="layui-input" autocomplete="off" placeholder="必填"/>
                        </div>
                    </div>
                    <div class="layui-input-block">
                        <label class="layui-form-label">用户组权限</label>
                        <div class="layui-inline">
                            <?php if(is_array($authrules) || $authrules instanceof \think\Collection || $authrules instanceof \think\Paginator): $i = 0; $__LIST__ = $authrules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authrule): $mod = ($i % 2 );++$i;if($authrule["level"] == 0): ?>
                                    <hr class="layui-bg-green">
                                <?php endif; ?>
                                <span>
                                    <?php echo str_repeat('- - ',$authrule['level']); ?>
                                </span>
                                <input type="checkbox" name="group-rules" value="<?php echo $authrule['id']; ?>" title="<?php echo $authrule['title']; ?>" lay-skin="primary">
                                <br>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                    <div class="layui-input-block">
                        <label class="layui-form-label">用户组状态</label>
                        <div class="layui-inline">
                            <input type="radio" name="group-status" value="1" title="启用" checked>
                            <input type="radio" name="group-status" value="0" title="关闭">
                        </div>
                    </div>
                    <button id="add-group-btn" class="layui-btn">添加用户组</button>
                    </form>
                </div>
                <!--查看用户组-->
                <div class="layui-tab-item">
                    <button id="refresh-group-btn" class="layui-btn layui-btn-normal layui-btn-sm">重载数据</button>
                    <table id="groupbox" class="layui-table" lay-filter="groupbox"></table>
                </div>
                <!--添加用户-->
                <div class="layui-tab-item">
                    <form class="layui-form">
                        <div class="layui-input-block">
                            <label class="layui-form-label">账号</label>
                            <div class="layui-inline">
                                <input name="username" class="layui-input" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="layui-input-block">
                            <label class="layui-form-label">密码</label>
                            <div class="layui-inline">
                                <input name="password" class="layui-input" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="layui-input-block">
                            <label class="layui-form-label">所属用户组</label>
                            <div class="layui-inline">
                                <?php if(is_array($authgroups) || $authgroups instanceof \think\Collection || $authgroups instanceof \think\Paginator): $i = 0; $__LIST__ = $authgroups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authgroup): $mod = ($i % 2 );++$i;if($authgroup["level"] == 0): ?>
                                        <hr class="layui-bg-green">
                                    <?php endif; ?>
                                    <span>
                                        <?php echo str_repeat('- - ',$authgroup['level']); ?>
                                    </span>
                                    <input type="checkbox" name="groups" value="<?php echo $authgroup['id']; ?>" title="<?php echo $authgroup['title']; ?>" lay-skin="primary">
                                    <br>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                        <button id="add-user-btn" class="layui-btn">添加用户</button>
                    </form>
                </div>
                <!--查看用户-->
                <div class="layui-tab-item">
                    <button id="refresh-user-btn" class="layui-btn layui-btn-normal layui-btn-sm">重载数据</button>
                    <table id="userbox" class="layui-table" lay-filter="userbox"></table>
                </div>
                <!--权限设置-->
                <!--<div class="layui-tab-item">-->
                    <!--<div>注册用户默认所属用户组</div>-->
                    <!--<div>添加用户默认所属用户组</div>-->
                <!--</div>-->
            </div>
        </div>
    </body>
    <script type="text/html" id="bar">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
    <!--<script type="text/html" id="switch">-->
        <!--<input type="checkbox"lay-skin="switch" lay-text="ON|OFF" checked>-->
    <!--</script>-->
    <script src="/static/js/jquery3.3.1.js"></script>
    <script src="/static/layui/layui.js"></script>
    <script src="/static/js/md5.js"></script>
    <script src="/static/js/auth.js"></script>
    </body>
</html>