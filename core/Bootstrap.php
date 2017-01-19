<?php
namespace core;
class Bootstrap {
	/**
	 * 框架初始化方法
	 * @return [type] [description]
	 */
	public static function run(){
		session_start();
		self::parseUrl();
	}

	/**
	 * 组合路由路径
	 * @return [type] [description]
	 */
	public static function parseUrl(){
		if(isset($_GET['s'])) {
			$info = explode("/",$_GET['s']);
			$class = '\web\controller\\'.  ucfirst($info[0]);
			$action = $info[1];
			// p($info);
		}else{
			$class = "\web\controller\Index";
			$action = "show";
		}

		$obj = new $class;
		$obj->$action(); //输出对象调用方法的结果
	}

}
