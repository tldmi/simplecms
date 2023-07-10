<?php

namespace front\Controllers;
use common\models\Post;
use common\modules\Pagination;

// отвечает за отображение списка постов
class PageController extends \common\Controllers\Controller {

	public function actionIndex($req, $res) {
		$count = 3;
		$offset = 0;

		if($req->param) {
			$offset = $req->param === 0 ? 0 : (($req->param-1) * $count);
		}

		if(ceil(Post::count() / $count) <= $offset / $count) {

			$this->render('notFound/notFound.php',['params' => ['message' => 'Не найдено']]);
			return;
		}

		$posts = POST::take($count)->skip($offset)->get();
		$count = POST::count();

		// объект для создания пагинации
		$pagination = new Pagination($count, $req->param, 3, 4);



		$this->render('page/page.php',['params' => ['posts' => $posts, 'pagination' => $pagination]]);

	}

}