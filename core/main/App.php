<?php
/**
 * 框架初始化/启动类
 */
namespace core\main;
class App{

    /**
     * 框架初始化
     */
    protected static function init(){
        //框架配置
    }

    /**
     * 运行框架
     */
    public static function run(){
        try{
            self::init();
            Hook::init();
        }catch(\Exception $e){
            var_dump($e);
        }
    }
}