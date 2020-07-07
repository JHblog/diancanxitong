<?php
/**
 * Created by PhpStorm.
 * User: 15161
 * Date: 2019/1/11
 * Time: 2:04
 */

namespace app\api\service;


class CurlService
{
    const GET = 0;
    const POST = 1;
    public $url;
    public $ch = null;
    private $type = 1;

    public function __construct() {

    }
    public function init( $url , $type = self::POST)
    {
        $this->url = $url;
        $this->ch = curl_init();
        $this->type = $type;
        return $this;
    }

    //post 方式传递数据
    public function send($param)
    {
        if( self::POST == $this->type) {
            return $this->posts($param);
        } else {
            return $this->gets($param);
        }
    }

    public function posts($post_data)
    {
        curl_setopt( $this->ch, CURLOPT_URL, $this->url );
        curl_setopt( $this->ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $this->ch, CURLOPT_HEADER, 0 );
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec( $this->ch );
        return $output;
    }

    public function gets($get_data)
    {
        $url = $this->url.'?'.http_build_query($get_data);
        
        curl_setopt( $this->ch, CURLOPT_URL, $url );
        curl_setopt( $this->ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $this->ch, CURLOPT_HEADER, 0 );
        $output = curl_exec( $this->ch );
        //var_dump($output);die;
        return $output;
    }

    public function curl_get($url)
    {

        $info = curl_init();
        curl_setopt($info,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($info,CURLOPT_HEADER,0);
        curl_setopt($info,CURLOPT_NOBODY,0);
        curl_setopt($info,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($info,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($info,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($info,CURLOPT_URL,$url);
        $output = curl_exec($info);
        curl_close($info);
        return $output;
    }


}