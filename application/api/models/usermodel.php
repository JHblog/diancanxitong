<?php
namespace app\api\models;

use think\Model;
use think\Session;
use think\Db;

class usermodel extends Model
{
	protected $pk = 'id';
	protected $table = 'dc_user';
	

	//封装请求用户数据
	public function userData($code)
	{
		$appid='wxceeb801812fb89b6';
		$appsecret='4cdceb08a4a646ab0372b8b375c61dea';
	
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$appsecret."&js_code=".$code."&grant_type=authorization_code";
		

		return $url;
	}

	// 增删改查方法
	
	public function insert($data)
	{
        // return $this ->add($data);     // 不能用 add 要用 save
        return $this ->save($data);  
	}

	public function update_my($where,$data)
	{
		$result = $this->where($where)->update($data);   // 或者直接return
		return $result;
        // return $this->where( $where )->save($data);

	}

	public function delete_my($where)
	{
		$result = $this->where($where)->delete();
		return $result;
	}


	public function find($where)
	{
		return $this->where($where)->find();
	}

	public function findall($where)
	{
		// return $this->select();
		return $this->where( $where )->select();
	}

	public function reg($data)
	{
		echo '<pre>';
		// var_dump($data);
		// die;
		$data2 = [
					'username' =>$data['username'],
					'userpass' =>md5($data['password'])
				];

		$where['username'] = $data['username'];
		if($a = $this->find($where))		// 判断用户名是否已注册
		{   

			$this->success('用户名已被注册');   					
		}else if(empty($data['password']))		
		{
	
			$this->success('密码不能为空');
		}else{
		
			$result = $this->insert($data2);
			return $result;
		}	

	}




}

?>
