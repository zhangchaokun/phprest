<?php
/**
 * 框架初始化
 */
namespace core\main;
class App{

    /**
     * 框架初始化
     */
    protected static function init(){
        //框架默认配置
    }

    /**
     * 运行框架
     */
    public static function run(){
        try{
            self::init();
            Hook::init();
            //路由
            //URL解析
            $uri = '';
            if(isset($_SERVER['PATH_INFO'])){
                $uri = $_SERVER['PATH_INFO'];
            }else if(isset($_SERVER['ORIG_PATH_INFO'])){
                $uri = $_SERVER['ORIG_PATH_INFO'];
            }else if(isset($_SERVER['QUERY_STRING'])){
                $queryString = explode('&',$_SERVER['QUERY_STRING']);
                $uri = $queryString[0];
            }

            $uri = trim($uri,'/');
            $segments = explode('/',$uri);
            $segments = array_filter($segments);

            $moduleName = empty($segments) ? 'common' : array_shift($segments);
            $controllerName = empty($segments) ? 'index' : array_shift($segments);
            $actionName = empty($segments) ? 'index' : array_shift($segments);
            $returnType = 'json';

            /*
            //控制器名解析
            if(strpos($controllerName,'.') !== false){
                $controllerNames = explode('.', $controllerName);
                $controllerNames = array_filter($controllerNames);
                array_walk($controllerNames,'ucfirst');
                $controllerName = implode($controllerNames);
            }
            */

            //返回类型解析
            if(strpos($actionName,'.') !== false){
                $actionNames = explode('.', $actionName);
                $actionNames = array_filter($actionNames);
                $actionName = $actionNames[0];
                $returnType = strtolower($actionNames[1]);
            }


            defined('MODULE_NAME')      or define('MODULE_NAME', $moduleName);
            defined('CONTROLLER_NAME')  or define('CONTROLLER_NAME', $controllerName);
            defined('ACTION_NAME')      or define('ACTION_NAME', $actionName);

            $class = NS.API_NAME.NS.MODULE_NAME.NS.CONTROLLER_LAYER.NS.CONTROLLER_NAME.'Controller';
            $action = ACTION_NAME;

            $api = new $class();
            $api->$action();
            
        }catch(\Exception $e){
            var_dump($e);
        }
    }
}