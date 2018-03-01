<?php

namespace yozh\product;

use yozh\base\Module as BaseModule;

class Module extends BaseModule
{

	const MODULE_ID = 'product';
	
    public $controllerNamespace = 'yozh\\' . self::MODULE_ID . '\controllers';

}
