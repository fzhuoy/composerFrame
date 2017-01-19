<?php
namespace web\controller;
use core\View;
use Gregwar\Captcha\CaptchaBuilder;  //引入验证码类，从composer获得
class Index {

	protected $view;  //模板对象
	public function __construct() {
		$this->view = new View();  

	}

	/**
	 * 默认action
	 * @return obj 链式操作方法
	 */
	public function show(){
		// p($_SESSION);
		 // echo ($this->view->make('index')->with('version', '1.0')) ;die;
		 // 说明：如上用实例化到的模板对象，调用对象make方法，生成模板文件路径，然后调用对象with方法，初始化模板变量，当echo对象时，调用对象中的__toString方法，引入模板文件，并对模板分配变量
		 echo $this->view->make('index')->with('version', '1.0');
	}

	public function post() {
		// echo(111);
		echo $this->view->make('login');
	}


	/**
	 * 验证码类
	 * @return [type] [description]
	 */
	// 说明：验证码类来自composer包，需要在项目根目录执行：composer require gregwar/captcha，引入验证码的composer包，执行后会发现vendor目录自动下载了验证码包，并且在composer.json文件中自动加入了require内容
	public function code() {
		header('Content-type: image/jpeg');
		$builder = new CaptchaBuilder;
		$builder->build(200,80);
		
		$builder->output();
		$_SESSION['phrase'] = $builder->getPhrase();

	}

}
