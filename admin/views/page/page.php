<table class="admin-post-list">
	<tr class="admin-post-list__line">
		<th class="admin-post-list__item">ID</th>
		<th class="admin-post-list__item">Заголовок</th>
		<th class="admin-post-list__item">Описание</th>
		<th class="admin-post-list__item">Дата</td>	
		<th class="admin-post-list__item">Смотр.</th>
		<th class="admin-post-list__item">Ред.</th>	
		<th class="admin-post-list__item">Уд.</th>	
	</tr>
<? foreach($params['posts'] as $post): ?>
	<tr class="admin-post-list__line">
		<td class="admin-post-list__item"><?=$post->id?></td>
		<td class="admin-post-list__item"><?=$post->title?></td>
		<td class="admin-post-list__item"><?=$post->intro?></td>
		<td class="admin-post-list__item"><?=$post->updated_at?></td>	
		<td class="admin-post-list__item"><a href=/admin/post/<?=$post->id?> >Смотр.</a></td>
		<td class="admin-post-list__item"><a href=/admin/post/update/<?=$post->id?>>Ред.</a></td>	
		<td class="admin-post-list__item"><a href=/admin/post/delete/<?=$post->id?>>Уд.</a></td>		
	</tr>
<? endforeach; ?>
</table>
<? $pagination = $params['pagination'] ?>
<div class="pagination">
	<? for($i=$pagination->getStart();$i<=$pagination->getEnd();$i++): ?>
		<a <? if($i == $pagination->getCurrentPage()): ?> class="current-page-link" <? endif;?> href=/admin/page/<?=$i?>><?=$i?></a>
	<? endfor; ?>
	<? if($pagination->getEnd() < $pagination->getCountPage()):?>
		... <a href=/admin/page/<?=$pagination->getCountPage()?>><?=$pagination->getCountPage()?></a>	
	<? endif;?>
</div>