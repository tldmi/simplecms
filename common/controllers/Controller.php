<?php

namespace common\Controllers;

use \common\modules\ServiceContainer as SC;
use \common\views\View;

// базовый класс контроллера, layoutPath - шаблон по умолчанию
// можно переопределить layout по умолчанию в наследующем контроллере при необходимости изменить макет
class Controller {

	protected static $instance;
	public $layoutPath;

	public function __construct() {
		$this->view = new View();
		$this->layoutPath = 'layout/layout.php';
	}
	// для рендера, использует базовый класс View
	public function render($template, $params = array(), $layoutPath = false) {

			$this->view->render($template, $params, ($layoutPath ? $layoutPath : $this->layoutPath));
		
	}

}