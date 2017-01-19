<?php 
namespace core;
/**
 * 模板基类
 */
class View {
	// 模板文件
	protected $file;
	// 模板变量
	protected $vars = []; //php5.4以上


	/**
	 * 渲染模板
	 * @param  string $file 模板文件
	 * @return 对象       链式操作对象
	 */
	public function make($file) {
		// echo(3);
		$this->file = "view/" . $file . ".html";
		// p($this);
		return $this;
	}

	/**
	 * 为模板分配变量方法
	 * @param  string $name  变量名
	 * @param  mixed $value 变量值
	 * @return obj        链式操作对象
	 */
	public function with( $name, $value) {
		// echo(2);
		$this->vars[$name] = $value;
		// p($this);
		return $this;
	}

	/**
	 * 魔术方法，加载我们的模板
	 * @return string toString方法必须返回一个字符串
	 */
	public function __toString() {
		// echo (1);
		extract($this->vars); //将数据中的键名作为变量名，键值作为变量值进行转换，并自动保存到内存中。
		include $this->file;
		return '';
	}


}