<?php

namespace admin\Controllers;
use common\models\Post;
use common\modules\Pagination;
use common\models\User;

// отвечает за отображение списка постов
class PageController extends \common\Controllers\Controller {

	public function actionIndex($req, $res) {
		$count = 10;
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
		$pagination = new Pagination($count, $req->param, 10, 4);



		// echo User::authorize('admin', '12345');
		// echo User::isAuthorized();
		// echo "<pre>";
		// print_r($_SESSION);


		$this->render('page/page.php',['params' => ['posts' => $posts, 'pagination' => $pagination]]);

	}

}