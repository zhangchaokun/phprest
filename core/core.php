<?php
/**
 * 框架核心
 */

/*
 * ------------------------------------------------------
 *  框架常量
 * ------------------------------------------------------
 */
require(__DIR__.'/base.php');

/*
 * ------------------------------------------------------
 *  最低版本
 * ------------------------------------------------------
 */
if(version_compare(PHP_VERSION,PHP_LESS_VERSION,'<')) {
    exit("PHP 版本大于5.4.0");
}

/*
 * ------------------------------------------------------
 *  框架初始配置
 * ------------------------------------------------------
 */
require(__DIR__.'/config.php');

/*
 * ------------------------------------------------------
 *  核心命名空间
 * ------------------------------------------------------
 */
use core\main\Config;
use core\main\Route;
use core\main\App;

/*
 * ------------------------------------------------------
 *  命名空间自动注册加载类
 * ------------------------------------------------------
 */
spl_autoload_register(function($class){
    $class = ltrim($class,NS);
    if(($lastSlash = strrpos($class, NS)) !== false){
        $namespace = substr($class,0,$lastSlash);
        $className = substr($class,$lastSlash + 1);
        if(file_exists(REST_PATH.str_replace(NS, DS, $namespace).DS.$className.EXT)){
            if(class_exists($className) === false){
                require(REST_PATH.str_replace(NS, DS, $namespace).DS.$className.EXT);
            }
        }
    }
},true);

/*
 * ------------------------------------------------------
 *  运行框架
 * ------------------------------------------------------
 */
APP::run();
