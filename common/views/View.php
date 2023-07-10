<?php

namespace common\Views;

use \common\modules\ServiceContainer as SC;

// базовый класс вида
class View {

	public function fetchPartial($template, $params = array()) {
		extract($params);
		ob_start();
		include SC::config()['viewPath'].'/'.$template;
		return ob_get_clean();
	}

	public function renderPartial($template, $params = array()) {
		echo $this->fetchPartial($template, $params);
	}

	public function fetch($template, $params = array(), $layoutPath) {
		$content = $this->fetchPartial($template, $params);
		return $this->fetchPartial($layoutPath, array('content' => $content));
	}

	public function render($template, $params = array(), $layoutPath) {
		echo $this->fetch($template, $params,$layoutPath);
	}



}
