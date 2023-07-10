<?php
require_once '../vendor/autoload.php';
require_once '../common/config/ormInit.php';



$klein = new \Klein\Klein();

use \common\modules\ServiceContainer as SC;


// Обрабатывает запросы, если есть controller/action в pathname, то запускает controller->action
// если pathname === /, то - PageController->actionIndex()
// в action передаются объекты $req, $res

$klein->respond('/public/?[:controller]?/[a:param]?', function($req, $res) {

	$controller = '\front\\'.SC::config()['controllerPath'].'\\'. ($req->controller ? $req->controller : 'Page').'Controller';
	$action = 'action';

	if($req->param) { // либо ничего, либо число
		if(is_numeric($req->param)) $action .= 'Index';
		else $action .= $req->param;
	} else $action .= 'Index';

	if(class_exists($controller)) {

		if(is_callable(array($controller, $action))) {
			(new $controller)->$action($req,$res);
			return;
		}
		
	}
	// если нет такого контроллера
	echo "netu(";

});


$klein->dispatch();