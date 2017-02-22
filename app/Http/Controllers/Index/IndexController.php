<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 后台首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index.index');
    }

   public function about()
    {
        return view('index.about');
    }
  
   public function course()
    {
        return view('index.course');
    }

    public function activity()
    {
        return view('index.activity');
    }
    
    public function contact()
    {
        return view('index.contact');
    }

     public function login()
    {
        $uid =  Session::get('uid');

        if($uid){
            return view('index.index');
        }else{
            return view('index.login');
        }

    }

     public function register()
    {
        $uid =  Session::get('uid');
        if($uid){
            return view('index.index');
        }else{
            return view('index.register');
        }

    }
    /*
     * 忘记密码页面
     */
    public function getback(){
        $uid = Session::get('uid');
        if($uid){
            return view('index.index');
        }else{
            return view('index.getback');
        }


    }
    /*
     * 修改密码
     * phone  电话号码
     * code  验证码
     * password  密码
     */
    public function updatePassword(Request $request)
    {
        $phone =  $request->input('phone');//用户电话
        $password =md5($request->input('password'));
        if ($password == '') {
            $result['errCode'] = 0;
            $result['msg'] = '密码不能为空';
            return json_encode($result);
        }
        $code = $request->input('code');//用户电话

        $cache_code = Session::get($phone.'_code');
        if($cache_code!=''){
            if ($code == $cache_code) {
                $info = DB::table('user')->where(array('phone' => $phone))->first();
                if ($info) {
                    $res = DB::table('user')->where(array('phone' => $phone))->update(array('password' => $password));
                    if ($res) {
                        Session::set($phone . '_code', '');
                        $result['errCode'] = 1;
                        $result['msg'] = '重置密码成功';
                        return json_encode($result);
                    } else {
                        $result['errCode'] = 0;
                        $result['msg'] = '请稍后重试';
                        return json_encode($result);
                    }
                } else {
                    $result['errCode'] = 0;
                    $result['msg'] = '该用户不存在';
                    return json_encode($result);
                }
            } else {
                $result['errCode'] = 0;
                $result['msg'] = '短信验证码错误';
                return json_encode($result);
            }
        }else{
            $result['errCode'] = 0;
            $result['msg'] = '短信验证码错误';
            return json_encode($result);
        }
    }
    /*
     * 用户录入
    */
    public function loginEnter(Request $request){
        $phone = $request->input('phone');//用户电话
        $password = md5($request->input('password'));
        if($password==''){
            $result['errCode'] = 0;
            $result['msg'] = '请填写用户名或者密码';
            return json_encode($result);
        }
        $list['phone'] = $phone;//电话
        $list['password'] = $password;//密码
        $list['status'] = 1;//状态为1  为正常dd($list);
        $info = DB::table('user')->where($list)->first();
        if($info){
            Session::put('uid', $info->id);
            Session::put('username', $info->username);
            $result['errCode'] = 1;
            $result['msg'] = '登录成功';
            return json_encode($result);
        }else{
            $result['errCode'] = 0;
            $result['msg'] = '用户名不存在或密码错误';
            return json_encode($result);
        }


    }
    /*
     *用户注册
     *电话号码
      *短信验证码
      *姓名
      *密码
    */
    public function registerEnter(Request $request){
        $username = $request->input('username');//用户名字
        $phone = $request->input('phone');//用户电话
        $code = $request->input('code');//验证码
        $password = $request->input('password');//密码
        $cache_code = Session::get($phone . '_code');
            if($code == $cache_code && $cache_code!='') {
                $info = DB::table('user')
                    ->where('phone', '=', $phone)
                    ->where('status', '=', 1)
                    ->first();
                if ($info) {
                    $result['errCode'] = 0;
                    $result['msg'] = '该用户名已被注册';
                    return json_encode($result);
                } else {
                    $list['phone'] = $phone;
                    $list['username'] = $username;
                    $list['password'] = md5($password);
                    $user = DB::table('user')->insertGetId(
                        $list
                    );
                    if($user){
                        Session::set($phone . '_code', '');
                        $result['errCode'] = 1;
                        $result['msg'] = '注册成功,请登录';
                        return json_encode($result);
                    }
                }
            }else{
                    $result['errCode'] =0;
                    $result['msg'] = '短信验证码错误';
                    return json_encode($result);
                }
            }


    /*
      * 发送短信验证码
      */
    public  function sendCode(Request $request){

        $phone = $request->input('phone','');
        if($phone == ''){
            $result['errCode'] = 0;
            $result['msg'] = '手机号码不能为空';
            return json_encode($result);
        }

        $code = $this->generatePhoneCode();
        header("Content-type: text/html; charset=utf-8");
        date_default_timezone_set('PRC'); //设置默认时区为北京时间
        //短信接口用户名 $uid
        $uid = 'GZJS000521';
        //短信接口密码 $passwd
        $passwd = 'wz@668';

        //$num ='136087976876';
        $message = '您的注册码为：'.$code.',【测试】';
        $msg = rawurlencode(mb_convert_encoding($message, "gb2312", "utf-8"));

        $gateway = "https://sdk2.028lk.com/sdk2/BatchSend2.aspx?CorpID={$uid}&Pwd={$passwd}&Mobile={$phone}&Content={$msg}&Cell=&SendTime=";
        $res = file_get_contents($gateway);
        if($res > 0){
            Session::set($phone . '_code', $code);
            $result['errCode'] = 1;
            $result['msg'] = '发送成功';
            return json_encode($result);
        } else {
            $result['errCode'] = 0;
            $result['msg'] = '发送错误';
            return json_encode($result);
        }

        // $deadline = date("Y-m-d H:i:s",time()+60*60);

        // if(TempPhone::where('phone',$phone)->first()){
        //     TempPhone::where('phone',$phone)->update(['code'=>$code,'deadline'=>$deadline]);
        // }else{
        //     $tempPhone = new TempPhone();
        //     $tempPhone->phone=$phone;
        //     $tempPhone->code=$code;
        //     $tempPhone->deadline=$deadline;
        //     $tempPhone->save();
        // }
        // $result['errCode'] = 1;
        // $result['msg'] = '发送成功';
        // return json_encode($result);

    }

    /*
     * 生成短信验证码
     */
    public function generatePhoneCode()
    {
        $code = '';
        $charset = '1234567890';
        $_len = strlen($charset)-1;
        for($i=0;$i<6;++$i){
            $code .= $charset[mt_rand(0,$_len)];
        }
        return $code;
    }
    /*
     * 退出登录
     */
    public  function loginout(Request $request){
        $uid = Session::get('uid');
        if($uid){
            Session::set('phone','');
            Session::set('username','');
        }
        $result['errCode'] =1;
        $result['msg'] = '退出成功';
        return json_encode($result);
    }
   /*
    * 个人中心页
    */
    public  function userCenter(){
        $uid = Session::get('uid');
        if($uid ==''){
            return view('index.login');
        }else{
            return view('index.user_center');
        }
    }
}
