<?php
/**
 * 框架钩子类
 */
namespace core\main;
class Hook{
    /**
     * 钩子列表
     */
    public static $tags = array();

    /**
     * 初始化
     */
    public static function init(){
        $dir = COMMON_MODULE_PATH;
        var_dump($dir);
    }

    /**
     * 执行钩子
     */
    public static function listen(){

    }

    /**
     * 执行类
     */
    public static function exec(){

    }
}