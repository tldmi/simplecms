<?php
require_once '../vendor/autoload.php';
require_once 'config/ormInit.php';


$klein = new \Klein\Klein();

use \App\modules\ServiceContainer as SC;
use \App\models\Post;


// Обрабатывает запросы, если есть controller/action в pathname, то запускает controller->action
// если pathname === /, то - SiteController->actionIndex()
// в action передаются объекты $req, $res

// попаду в action SiteController только если param === / || (int)
$klein->respond('/public/?[:controller]?/[a:param]?', function($req, $res) {

	$controller = '\App\\'.SC::config()['controllerPath'].'\\'. ($req->controller ? $req->controller : 'Page').'Controller';
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
	echo "netu";

});


$klein->dispatch();