<div class="auth">
	<form action="/admin/registr/registration" method="post">
		Логин: <input type="text" name="username"> <br>
		Пароль: <input type="password" name="password"> <br>
		Соль(необязат.): <input type="password" name="salt"> <br>
		<input type="submit" name="send" value="Отправить"> <br>
	</form>
	<? if($params['error']): ?>
		<strong>Ошибка</strong><br> 
		<?=$params['message']?>
	 <? endif;?>
</div>