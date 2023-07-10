<?php

namespace front\Controllers;
use common\models\Post;

class PostController extends \common\Controllers\Controller {
	// показывает один конкретный пост
	public function actionIndex($req, $res) {

		$post = POST::find($req->param);
		if(!$post) {
			$this->render('notFound/notFound.php',['params' => ['message' => 'Не найдено']]);
			return;
		} 

		$this->render('post/post.php',['params' => ['post' => $post]]);

	}

}