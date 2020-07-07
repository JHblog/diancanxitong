<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
use think\Route;

Route::rule("get/code", "api/Index/savecode");


//后台
Route::rule("login","index/Login/index");

Route::rule("checklogin","index/Login/check");
// return [
//     // api版本路由
//     //'api/:version/:controller'=>'api/:version.:controller/index',// 省略方法名时 网址格式:http://www.xxx.com/api/v1/index
//     'api//:controller/:function'=>'api/:controller/:function'// 有方法名时 网址格式:http://www.xxx.com/api/v1/index/login
// ];
