<div class="post">	
	<form action=/admin/post/update/<?=$params['post']->id?> method="post">
		<h1 class="post__title"><input type="text" name="title" value=<?=$params['post']->title?>></h1>

		<div class="post__content">	
				<div>Интро:<br>
					<textarea name="intro" cols="90" rows="10"><?=$params['post']->intro?></textarea>						
				</div>

				<div>Контент:<br>
					<textarea name="text" cols="90" rows="10"><?=$params['post']->text?></textarea>						
				</div>

				<div>
					<input type="submit" value="Редактировать" name="send">							
				</div>
	

		</div>
		<div class="post__date">	
			Дата: <em><?=$params['post']->updated_at?></em>				
		</div>
	</form>		
</div>

