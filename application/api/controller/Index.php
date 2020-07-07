<?php
namespace app\api\controller;

use think\Controller;
use think\Request;
use app\api\service\CurlService;
use app\api\models\usermodel;
class Index extends Controller
{

	protected $curl;
	protected $umodel;
    //进行依赖注入
	public function __construct(CurlService $CurlService, usermodel $usermodel)
	{
		$this->curl=$CurlService;
		$this->umodel=$usermodel;
	}

    public function savecode(request $Request)
    {
    	try{
    	//获取code
    	
    	$data= $Request->param();
    	$code= $data['code'];

    	//
    	$url= $this->umodel->userData($code);

        $result = $this->curl->curl_get($url);
    	return $result;

    	}catch(Exception $e){
    		return '获取失败,错误码:100 '.$e->getMessage();

    	}
    	
    }


}
