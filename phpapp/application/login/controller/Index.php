<?php
namespace app\login\controller;

use think\Controller;
use think\Db;
use app\admin\model\Users as UsersModel;
use app\admin\model\Web as WebModel;
use app\blog\controller\Base;
use PHPMailer\QQMailer;
use think\captcha\Captcha;

// 一切登陆相关操作
class Index extends Controller
{
    public function index()
    {
        if(session('user')){
            $this ->redirect('/admin');
        }
        // 判断网站状态以确定是否让页面在iFrame中显示
        $web = WebModel::get(1);
        return view('login/login',['webData'=>$web]);
    }
    // 验证登录
    public function validateLogin()
    {
        $data = input('post.');
        // 检查验证码是否正确
        $captcha = new Captcha();
        if(!($captcha->check($data['vcode']))) {
            return json(['code' => -1, 'msg' => '验证码错误']);
        }
        // 验证邮箱合法性
        if(!(isEmail($data['username']))){
            return json(["code"=>-1, "msg"=>"邮箱格式不合法"]);
        }
        // 检查用户是否存在
        $userData = UsersModel::queryUser($data['username']);
        if ($userData === null){
            return json(["code"=>-1, "msg"=>"该账号未注册"]);
        }
        $data = passWordMd5($data);
        $userData = UsersModel::validateuser($data);
        if (!($userData === null)){
            session('user',$userData);
            return json(["code"=>0,"msg"=>"登录成功"]);
        }else{
            return json(["code"=>-1,"msg"=>"用户名或密码错误"]);
        }
    }

    // 验证登录状态
    public function isLogin()
    {
        if(session('?user')){
            return json(["code"=>0, "msg"=>"已登陆"]);
        }else{
            return json(["code"=>-1, "msg"=>"未登录"]);  
        }
    }

    // 后台界面登出
    public function LoginOff()
    {
        $user = session('user');
        session(null);
        $this->redirect('/');
    }
    // 其他界面登出
    public function LoginOff2()
    {
        $user = session('user');
        session(null);
        return json(['code'=>0,'msg'=>'登出成功']);
    }
    // 注册，找回密码发送邮件
    public function sendMail()
    {
        $data = input('post.');
        // 检查验证码 后续的注册，找回密码时不验证注册码，只验证邮箱注册码
        $captcha = new Captcha();
        if(!($captcha->check($data['vcode']))) {
            return json(['code' => -1, 'msg' => '验证码错误']);
        }
        // 验证邮箱合法性
        if(!isEmail($data['username'])){
            return json(["code"=>-1, "msg"=>"邮箱格式不合法"]);
        }
        $mcode = mt_rand(1000,9999);
        session('mcode',['username'=>$data['username'],'mcode'=>$mcode]);
        $title = '验证码';
        $content = '验证码为'.$mcode;
        $mailer = new QQMailer();
        $info = $mailer->send($data['username'], $title, $content);
        dump($info);
        if($info){
            return json(['code'=>0, 'msg'=>'验证码已发送,请查收']);
        }else{
            return json(['code'=>0, 'msg'=>'发送失败']);
        }
    }

    // 注册
    public function register()
    {
        $data = input('post.');
        // 检查邮箱验证码是否正确
        if(session('mcode') != ['username'=>$data['username'],'mcode'=>$data['mcode']]){
            return json(["code"=>-1,"msg"=>"邮箱验证码错误"]);
        }
        // 检查邮箱合法性
        if (!isEmail($data['username'])) {
            return json(["code" => -1, "msg" => "邮箱格式不合法"]);
        }
        // 检查昵称是否为空
        if ($data['nickname'] == '') {
            return json(["code" => -1, "msg" => "请设置昵称"]);
        }
        // 检查昵称是否已存在
        if (UsersModel::isExistNickName($data['nickname'])) {
            return json(["code" => -1, "msg" => "昵称已存在"]);
        }
        // 检查邮箱是否已被注册
        if (UsersModel::queryUser($data['username'])) {
            return json(["code" => -1, "msg" => "邮箱已被注册"]);
        }
       
        // 所有验证完成，写入注册数据
        session('code',null);
        $data = passWordMd5($data);
        $info = UsersModel::create($data,true);
        if($info){
            // 把用户加入到普通用户组,测试->id或者['id']都可以使用
            db('auth_group_access')->insert(['uid'=>$info['id'],'group_id'=>5]);
            return json(["code"=>0, "msg"=>"注册成功"]);
        }else{
            return json(["code"=>0, "msg"=>"注册失败"]);
        }
    }

    // 重置密码
    public function resetPassword()
    {
        $data = input('post.');
        // 验证邮箱合法性
        if (!isEmail($data['username'])) {
            return json(["code" => -1, "msg" => "邮箱格式不合法"]);
        }
        // 检查邮箱验证码
        if(session('mcode') != ['username'=>$data['username'],'mcode'=>$data['mcode']]){
            return json(["code"=>-1,"msg"=>"邮箱验证码错误"]);
        }
        // 检查邮箱是否注册
        $userData = UsersModel::queryUser($data);
        if($userData === null){
            return json(["code"=>-1, "msg"=>"该账号未注册"]);
        }
        // 修改账号信息
        session('mcode',null);
        $data = passWordMd5($data);
        $info = UsersModel::editUsers($data);
        if($info){
            return json(["code"=>0,"msg"=>"密码已修改"]);
        }else{
            return json(["code"=>0,"msg"=>"密码修改失败"]);
        }
    }
}
