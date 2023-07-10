<? foreach($params['posts'] as $post): ?>
<div class="post-list">
	<div class="post-list__item">
		<h2 class="post-list__item-title"><?=$post->title?></h2>
		<div class="post-list__left">
			<p><?=$post->intro?></p>
		</div>
		<div class="post-list__right">
			<p><?=$post->updated_at?></p>			
		</div>
		<div class="post-list__moreinfo">
				<a href=/public/post/<?=$post->id?>>Подробнее</a>
		</div>
	</div>
</div>
<? endforeach; ?>
<? $pagination = $params['pagination'] ?>
<div class="pagination">
	<? for($i=$pagination->getStart();$i<=$pagination->getEnd();$i++): ?>
		<a <? if($i == $pagination->getCurrentPage()): ?> class="current-page-link" <? endif;?> href=/public/page/<?=$i?>><?=$i?></a>
	<? endfor; ?>
	<? if($pagination->getEnd() < $pagination->getCountPage()):?>
		... <a href=/public/page/<?=$pagination->getCountPage()?>><?=$pagination->getCountPage()?></a>	
	<? endif;?>
</div>