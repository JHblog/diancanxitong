<?php
namespace app\index\controller;
use think\Request;
use think\Db;
use app\idnex\validate\AdminUsers;
class Login extends \think\Controller
{
    public function index()
    {
       return $this->fetch('index');
    }

    public function check(request $Request)
    {
    	$data=$Request->param();

    	// $res = Db::connect();

    	// $udata = Db::table('dc_user')->select();
		$validate = validate('AdminUser');
 
		if(!$validate->check($data)){
		    dump($validate->getError());
		}
    }
}
