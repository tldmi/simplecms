<?php
require_once '../vendor/autoload.php';
require_once '../common/config/ormInit.php';
session_start();

$klein = new \Klein\Klein();

use \common\modules\ServiceContainer as SC;
use \common\models\User;

		

// Обрабатывает запросы, если есть controller/action в pathname, то запускает controller->action
// если pathname === /, то - AuthController->actionIndex()
// в action передаются объекты $req, $res

$klein->respond('/admin/?[:controller]?/[a:param]?/[i:param2]?', function($req, $res) {


	$controller = '\admin\\'.SC::config()['controllerPath'].'\\'. ($req->controller ? $req->controller : 'Page').'Controller';
	$action = 'action';

	if($req->param) { // либо ничего, либо число
		if(is_numeric($req->param)) $action .= 'Index';
		else $action .= $req->param;
	} else $action .= 'Index';

	// если юзер не авторизирован, то редирект на страницу авторизации
	if(!User::isAuthorized()) {
		$controller = '\admin\controllers\AuthController';
		$action = strtolower($action) == 'actionauthorize' ? 'actionauthorize' : 'actionIndex';

	};

	if(class_exists($controller)) {
		
		if(is_callable(array($controller, $action))) {
			
			(new $controller)->$action($req,$res);
			return;
		}
		
	}
	echo "netu";

});


$klein->dispatch();