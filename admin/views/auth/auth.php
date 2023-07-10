<div class="auth">
	<form action="/admin/auth/authorize" method="post">
		Логин: <input type="text" name="username" > <br>
		Пароль: <input type="password" name="password"> <br>
		<input type="submit" name="send" value="Отправить"> <br>
	</form>
	<? if($params['fail']): ?> Неверный логин или пароль <? endif;?>
</div>