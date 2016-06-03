<?php
//开始运行时间和内存使用
define('START_TIME', microtime(true));
define('START_MEM', memory_get_usage());

//框架版本
define('REST_VERSION', '1.0.0');

//系统常量
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('ROOT_PATH') or define('ROOT_PATH', realpath('./') . DS);
defined('APP_PATH')  or define('APP_PATH', realpath('./') . DS);
defined('CORE_PATH') or define('CORE_PATH', APP_PATH . 'core' . DS);

//环境常量
define('IS_CGI', strpos(PHP_SAPI, 'cgi') === 0 ? 1 : 0);
define('IS_WIN', strstr(PHP_OS, 'WIN') ? 1 : 0);
define('IS_MAC', strstr(PHP_OS, 'Darwin') ? 1 : 0);
define('IS_CLI', PHP_SAPI == 'cli' ? 1 : 0);
define('IS_AJAX', (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? true : false);
define('NOW_TIME', $_SERVER['REQUEST_TIME']);
define('REQUEST_METHOD', IS_CLI ? 'GET' : $_SERVER['REQUEST_METHOD']);
define('IS_GET', REQUEST_METHOD == 'GET' ? true : false);
define('IS_POST', REQUEST_METHOD == 'POST' ? true : false);
define('IS_PUT', REQUEST_METHOD == 'PUT' ? true : false);
define('IS_DELETE', REQUEST_METHOD == 'DELETE' ? true : false);