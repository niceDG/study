<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Exception;
use think\Db;
use think\Session;

class Index extends Controller
{
    public function index()
    {
	    $title = '用户登录';
	    $this->assign('title', $title);
	    return $this->fetch();
    }
    public function register()
    {
	    $title = '用户注册';
	    $this->assign('title', $title);
	    return $this->fetch();
    }
    public function forgot_form()
    {
	    $title = '重置密码';
	    $this->assign('title', $title);
	    return $this->fetch();
    }
    public function secondhand_release()
    {   
	    $this->check_valid_user();
	    $title = '该出售时就出售';
	    $this->assign('title', $title);
	    return $this->fetch();
    }
    public function secondhand_buy()
    {
	    $this->check_valid_user();
	    $title = '不出售时就收购';
	    $this->assign('title', $title);
	    return $this->fetch();
    }
    public function display_goods(Request $request)
    {   
        $this->check_valid_user();
	    $title = '查看';
	    $this->assign('title', $title);
	    return $this->fetch();
    }
    public function display_buygoods(Request $request)
    {   
        $this->check_valid_user();
	    $title = '查看';
	    $this->assign('title', $title);
	    return $this->fetch();
    }
    public function release(Request $request)
    {
        $this->check_valid_user();
        $datatime=date('Y-m-d H:i:s');
        $username=Session::get('valid_user');
        $goods=$request->param('goods');
        $title1=$request->param('title1');
        $describe=$request->param('describe');
        $phonenum=$request->param('phonenum');
	    try{
		if (!$this->filled_out($_POST)) {
      			throw new Exception('没有完整填写表格');
    		}
		if ((strlen($title1) <= 0) || (strlen($title1) > 60)) {
		      throw new Exception('标题要20字以内');
    		}
		if ((strlen($describe) <= 0) || (strlen($describe) > 300)) {
		      throw new Exception('物品描述要少于100字');
    		}
		if ((strlen($phonenum) <= 0) || (strlen($phonenum) > 15)) {
		      throw new Exception('号码长度大于15');
    		}

        $file = $request->file('file');
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/jpg")|| ($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/x-png")|| ($_FILES["file"]["type"] == "image/png"))){
             if ($_FILES["file"]["error"] > 0)
            {
                $this->error( "只能上传图片",'index/member');
            }
              
        if(empty($file)){
            $this->error('请选择上传的文件');
        }
       $info = $file->move(ROOT_PATH.'public/static/admin'.DS.'images');
        if(!$info){
           // $this->success('文件上传至：'.$info->getRealPath());
            $this->error($file->getError());
        }}
            $imgurl = $info->getRealPath();
            $imgurl = substr($imgurl,48,107);
	        Db::table('releasegoods')->insert(['id'=>NULL,'username'=>$username,'goods'=>$goods,'title'=>$title1,'describegoods'=>$describe,'phonenum'=>$phonenum,'img'=>$imgurl,'datatime'=>$datatime]);
	    	$this->success('提交成功', 'index/member');
	    }catch(Exception $e){
		$this->error('提交失败:只能上传图片');
	    }
    }
    public function buy(Request $request)
    {   
        $this->check_valid_user();
        $datatime=date('Y-m-d H:i:s');
        $username=Session::get('valid_user');
        $goods=$request->param('goods');
        $title1=$request->param('title1');
        $describe=$request->param('describe');
        $phonenum=$request->param('phonenum');
	    try{
		if (!$this->filled_out($_POST)) {
      			throw new Exception('你没有完整填写表单');
    		}
		if ((strlen($title1) <= 0) || (strlen($title1) > 60)) {
		      throw new Exception('标题要20字以内');
    		}
		if ((strlen($describe) <= 0) || (strlen($describe) > 300)) {
		      throw new Exception('物品描述要少于100字');
    		}
		if ((strlen($phonenum) <= 0) || (strlen($phonenum) > 15)) {
		      throw new Exception('号码大于15位');
    		}
	        Db::table('buygoods')->insert(['id'=>NULL,'username'=>$username,'goods'=>$goods,'title'=>$title1,'describegoods'=>$describe,'phonenum'=>$phonenum,'datatime'=>$datatime]);
	    	$this->success('提交成功', 'index/member');
	    }catch(Exception $e){
		$this->error('提交失败:'.$e->getMessage());
	    }
    }
    public function forgot_passwd(Request $request)
    {
        $username = $request->param('username');
	    $result = Db::table('user')
		   ->where('username', $username)
           ->select();
        if(count($result)<=0){
            $this->error('重置失败：没有这个账号。');
        }else{
            $num=rand(100000,999999);
            $shanum=sha1($num);
	        $result = Db::table('user')
		        ->where('username', $username)
                ->update(['passwd'=>$shanum]);
            $this->success($username.'密码重置为：'.$num,'index/index');
        }
    }
    public function login(Request $request)
    {
	    $username = $request->param('username');
	    $passwd = $request->param('passwd');
	    $passwd = sha1($passwd);
	    $result = Db::table('user')
		   ->where('username', $username)
		   ->where('passwd', $passwd)
		   ->select();	
	    if(count($result) <= 0){
		    $this->error('登录失败:账号或密码错误');
	    }else{
		    Session::set('valid_user', $username );
            $this->success('登录成功', 'index/member');

	    }
    }
    public function logout()
    {
        session_start();
        $old_user=Session::get('valid_user');
        // 如果有用户登录就记录在日志中
        session('[destroy]');
       // unset($_SESSION['valid_user']);
        $result_dest = session_destroy();
        //启动输出
        if (!empty($old_user)) {
            if ($result_dest)  {
                // if they were logged in and are now logged out
                echo '注销成功<br />';
                $this->success('','index/index');
            } else {
                 // they were logged in and could not be logged out
                 echo '你不能注销<br />';
           }
        } else {
             // if they weren't logged in but came to this page somehow
             echo '你没有登录所以无需注销<br />';
             $this->success('','index/index');
        }
    }
    public function register_new(Request $request)
    {
	    $email = $request->param('email');
	    $username = $request->param('username');
	    $passwd = $request->param('passwd');
	    $passwd2 = $request->param('passwd2');

	    try{
		if (!$this->filled_out($_POST)) {
      			throw new Exception('你没有选择文件');
    		}

    		// email address not valid
    		if (!$this->valid_email($email)) {
      			throw new Exception('这不是有效的邮箱地址');
    		}

    		// passwords not the same
    		if ($passwd != $passwd2) {
      			throw new Exception('两次密码不一致');
    		}
		if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
		      throw new Exception('密码长度要在6到16位之间');
    		}
		$passwd = sha1( $passwd );
	        $this->registeration($username, $email, $passwd);	
	    	$this->success('注册成功', 'index');
	    }catch(Exception $e){
		$this->error('注册失败:'.$e->getMessage());
	    }
    }
    public function member(Request $request)
    {   
        $this->check_valid_user();
        $title = '首页';
        $this->assign('title', $title);
        return $this->fetch();
    }

    public function display_release(Request $request)
    {   
	    $this->check_valid_user();
        $r_list = Db::table('releasegoods')->order('username')->paginate(9);
        $this->assign('r_list',$r_list);
	    $bm_table = true;
	    $title = '二手发布';
	    $this->assign('title', $title);
	    $this->assign('bm_table', $bm_table);
	    return $this->fetch();
    }

    public function display_buy(Request $request)
    {   
	    $this->check_valid_user();
        $b_list = Db::table('buygoods')->order('username')->paginate(9);
        $this->assign('b_list',$b_list);
	    $bm_table = true;
	    $title = '二手发布';
	    $this->assign('title', $title);
	    $this->assign('bm_table', $bm_table);
	    return $this->fetch();
    }

    public function display_changepw()
    {
	    $username = Session::get('valid_user');
        if(!$username){
            echo '你没有登录.<br />';
            $this->error('你没有登录','index/login');
            exit;
       }
	    $title = '修改密码';
	    $this->assign('title', $title);
	    return $this->fetch();
    }
    public function changepw(Request $request)
    {
        $this->check_valid_user();   
	    $username = Session::get('valid_user');
	    $new_passwd = $request->param('new_passwd');
        $new_passwd2 = $request->param('new_passwd2');
        $newpw=sha1($new_passwd);
        try {
            if (!$this->filled_out($_POST)) {
                throw new Exception('你没有填写好表格，请返回重试。');
            }
            if ($new_passwd != $new_passwd2) {
                throw new Exception('两次密码不一致。');
            }
            if ((strlen($new_passwd) > 16) || (strlen($new_passwd) < 6)) {
                throw new Exception('新密码长度必须在6到16之间');
            }
            // attempt update
            //change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);     
	        $result = Db::table('user')
		    ->where('username', $username)
            ->update(['passwd'=>$newpw]);
            $this->success('密码修改为'.$new_passwd,'index/logout');
           }
    catch (Exception $e) {
            echo $e->getMessage();
              }

    }
    private function filled_out($form_vars) {
  	// test that each variable has a value
  	foreach ($form_vars as $key => $value) {
     		if ((!isset($key)) || ($value == '')) {
        		return false;
     		}
  	}
  	return true;
    }

    private function valid_email($address) {
  	// check an email address is possibly valid
  	if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $address)) {
   		 return true;
  	} else {
    		return false;
  	}
    }
    private function registeration($username, $email, $password) {
	$result = Db::table('user')->where('username', $username)->select();	
	if(count($result) > 0){
		throw new Exception('That username is taken - go back and choose another one.');	
	}
	$row = array();
	$row['username'] = $username;
	$row['email'] = $email;
	$row['passwd'] = $password; 
	Db::table('user')->insert($row);
    }
    private function check_valid_user(){
	if(!Session::has('valid_user') ){
		$this->error('还没有登录.','index/index');
	}

    }
    public function mysellbill(){
        $this->check_valid_user();
        $list = Db::table('releasegoods')->order('username')->where('username',Session::get('valid_user'))->paginate(9);
        $this->assign('list',$list);
        $title = '我的出售';
        $this->assign('title',$title);
        return $this->fetch();
    }
    public function mybuybill(){
        $this->check_valid_user();
        $listbuy = Db::table('buygoods')->order('username')->where('username',Session::get('valid_user'))->paginate(9);
        $this->assign('listbuy',$listbuy);
        $title = '我的收购';
        $this->assign('title',$title);
        return $this->fetch();
    }
    public function r_delete(){
        $this->check_valid_user();
        $nid=$_GET['id'];
        $a=DB::table('releasegoods')->where('id',$nid)->column('img');
        unlink(ROOT_PATH.'public/static/'.$a[0]);
        Db::table('releasegoods')->where('id',$nid)->delete();
        $this->redirect('index/mysellbill');
    }
    public function b_delete(){
        $this->check_valid_user();
        $nid=$_GET['id'];
        Db::table('buygoods')->where('id',$nid)->delete();
        $this->redirect('index/mybuybill');
    }
}
