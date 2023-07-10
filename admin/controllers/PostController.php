<?php

namespace admin\Controllers;
use common\models\Post;

class PostController extends \common\Controllers\Controller {

	public function actionIndex($req, $res) {

		$post = POST::find($req->param);
		if(!$post) {
			$this->render('notFound/notFound.php',['params' => ['message' => 'Не найдено']]);
			return;
		} 

		$this->render('post/post.php',['params' => ['post' => $post]]);

	}

	public function actionUpdate($req, $res) {
		$params = $req->params();
		$post = Post::find($params['param2']);
		if(!$post) {
			$this->render('post/infoMessage.php',['params' => ['title' => 'Записи нет', 'message' => 'нет такой записи']]);
			return;
		}

		switch ($req->method()) {
			case 'GET':
				$this->render('post/postUpdate.php',['params' => ['post' => $post]]);
				break;

			case 'POST':

				$post->title = $params['title'];
				$post->text = $params['text'];
				$post->intro = $params['intro'];
				$post->save();
				$this->render('post/infoMessage.php',['params' => ['title' => 'Обновлено', 'message' => "запись $post->id обновлена"]]);

				break;
		}

	}

	public function actionDelete($req, $res) {
		$params = $req->params();
		$post = Post::find($params['param2']);
		if(!$post) {
			$this->render('post/infoMessage.php',['params' => ['title' => 'Записи нет', 'message' => 'нет такой записи']]);
			return;
		}

		$post->delete();
		$this->render('post/infoMessage.php',['params' => ['title' => 'Удалено', 'message' => "запись $post->id удалена"]]);

	}

	public function actionCreate($req, $res) {
		$params = $req->params();

		$post = new Post();

		switch ($req->method()) {
			case 'GET':
				$this->render('post/postCreate.php',['params' => ['post' => $post]]);
				break;

			case 'POST':

				$post->title = $params['title'];
				$post->text = $params['text'];
				$post->intro = $params['intro'];
				$post->save();
				$this->render('post/infoMessage.php',['params' => ['title' => 'Создано', 'message' => "запись $post->id создана"]]);

				break;
		}


	}

}