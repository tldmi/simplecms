<?php

namespace admin\Controllers;
use common\models\Post;
use common\models\User;
// регистрация юзера, регать юзера может только другой зареганый авторизированный юзер
class RegistrController extends \common\Controllers\Controller {

	public function actionIndex($req, $res) {

		$this->render('registr/registr.php',['params' => ['fail' => false]]);

	}

	public function actionRegistration($req, $res) {
		if(!User::isAuthorized()) $this->render('auth/auth.php',['params' => ['fail' => true]]);

		$params = $req->params();

		foreach ($params as $key => $val) {
			if($key === 'salt') continue;
			if(!strlen($val)) {
				$this->render('registr/registr.php',['params' => ['error' => true, 'message' => "Заполните поля"]]);
				return;
			}
		}

		$user = new User;
		try {
			$hashes = User::passwordHash(htmlspecialchars($params['password']),htmlspecialchars($params['salt']));
			$user->username = htmlspecialchars($params['username']);
			$user->password = $hashes['hash'];
			$user->salt = $hashes['salt'];		
			$user->save();	
		} catch (Exception $err) {
			$this->render('registr/registr.php',['params' => ['error' => true, 'message' => $err->getMessage()]]);
		}
			$this->render('registr/registr.php');

	}

}