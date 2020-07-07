<?php
namespace app\common\validate;

use think\Validate;

class AdminUser extends Validate
{
	// 验证规则
	protected $rule = [
		'username'   => 'require|unique:dc_user|regex:[A-Za-z0-9]{4,8}|token',
		'password'   => 'require|regex:[A-Za-z0-9]{5,18}',
		'repassword' => 'require|regex:[A-Za-z0-9]{5,18}|confirm:password',
	];
	
	// 提示信息
	protected $message = [
		'username.require'   => '用户名不能为空',
		'username.unique'    => '用户名已被注册',
		'username.regex'     => '用户名格式不正确,4-8位数字字母',
		'password.require'   => '密码不能为空',
		'password.regex'     => '密码格式不正确,5-16位数字字母',
		'repassword.require' => '确认密码不能为空',
		'repassword.regex'   => '确认密码格式不正确,5-16位数字字母',
		'repassword.confirm' => '两次密码不一致',
		'email.require'      => '邮箱不能为空',

	];
}
