<?php
namespace api\goods\controller;
use core\lib\Http;
class CategoryController{
    public function test(){
        var_dump($this);
        /*
        //if(IS_POST){
            $url = "http://weixinapi.lianduan.com.cn/Address/Address.Get";
            $parentid = empty($parentid) ? 0 : $parentid;
            $param = array("parentid" => $parentid);
            $json_param = json_encode($param);
            //var_dump($json_param);
            //echo $json_param;
            $result = Http::doJsonPost($url,$json_param);
            exit($result);
        //}
            */
    }
}