<?php

namespace admin\Controllers;
use common\models\Post;
use common\models\User;


// авторизация юзера
class AuthController extends \common\Controllers\Controller {

	public function actionIndex($req, $res) {

		$this->render('auth/auth.php',['params' => ['fail' => false]]);

	}

	public function actionAuthorize($req, $res) {
		$params = $req->params();

		if(User::authorize(htmlspecialchars($params['username']), htmlspecialchars($params['password']))) {
			$this->render('post/infoMessage.php',['params' => ['title' => 'Вы авторизированы', 'message' => "вы успешно авторизировались"]]);
		} else {
			$this->render('auth/auth.php',['params' => ['fail' => true]]);
		}
	}

	public function actionLogout($req, $res) {
		$params = $req->params();

		User::logout();
		$this->render('post/infoMessage.php',['params' => ['title' => 'Вы вышли', 'message' => "сессия очищена"]]);

	}



}