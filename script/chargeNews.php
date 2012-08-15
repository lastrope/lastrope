<?php
    $news_id = intval($_POST['id']);
    $news_title = addslashes($_POST['title']);
    
	require '../bootstrap.php';
	require '../class/Actus.php';
	require '../class/Event.php';

	$actus = new Actus($pdo,$session->read('langue'));
	$event = new Event($pdo,$session->read('langue'));
	
	$actus_inf = $actus->isActuExist($news_id,$news_title);
	$event_inf = $event->isEventExist($news_id,$news_title);
	
	echo '
	<article>
	<div class="article_block">
		<div class="content_article">
			<p>';
	if(!empty($actus_inf)){
		echo nl2br($actus_inf['body']);
	} else {
		echo nl2br($event_inf['body']);
	}
	echo '
			</p>
		</div>
	</div>
	</article>';
?>