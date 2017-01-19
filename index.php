<?php
include "vendor/autoload.php"; //加载composer自动加载文件
//这里我们没有使用php的__autoload自动加载，而是使用了composer的自动加载，配置在composer.json中
//
//框架流程：
//1. 引入composer的自动加载文件autoload.php。
//2. 在composer.json中配置需要自动加载的目录，看composer.json中的autoload段。
//3. 执行Bootstrap中的run方法。run方法调用self::parseUrl()，根据get参数构建class和action，默认class为Index，action为show(); 实例化class并执行action（这里不需要再include class文件，因为composer的autoload已经加载该目录和文件），使框架运行。
//
core\Bootstrap::run();
