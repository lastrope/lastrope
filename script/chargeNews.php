<?php
    $news_id = isset($_POST['id'])?intval($_POST['id']):0;
    $news_title = isset($_POST['title'])?addslashes($_POST['title']):'null';
   
	require '../bootstrap.php';
	require '../class/Actus.php';
	require '../class/Event.php';
	require '../class/Members.php';

	$actus = new Actus($pdo,$session->read('langue'));
	$event = new Event($pdo,$session->read('langue'));
	$member = new Members($pdo,$session->read('langue'));
	
	$actus_inf = $actus->isActuExist($news_id,$news_title);
	$event_inf = $event->isEventExist($news_id,$news_title);
	$member_inf = $member->getMembersById($news_id);
	$output="";
	?>
	<article>
	<div class="article_block">
		<div class="content_article">
			<p class="test">
	<?php
	if($news_title != 'null'){
	    if(!empty($actus_inf)){
		    $output .= nl2br($actus_inf['body']);
	    } else {
		    $output .= nl2br($event_inf['body']);
	    }
	}else{
	    $output .= '<span id="avatar_member"><img src="../public/media/image/'.$member_inf['picture'].'" /> </span>';
	}
	echo $output;
	?>
			</p>
		</div>
	</div>
	</article>
	
