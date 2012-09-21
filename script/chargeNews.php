<?php
// Récupération de l'id 
$news_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
//Type de news récolter
$news_type = isset($_POST['type']) ? addslashes($_POST['type']) : '';

require '../bootstrap.php';
require '../class/Actus.php';
require '../class/Event.php';
require '../class/Members.php';
require '../class/Music.php';
require '../class/Video.php';
$output = "";
?>
<article>
    <div class="article_block">
	<div class="content_article">
	    <p>
		<?php
		// Construction de la réponse en fonction du type de news demandé
		switch ($news_type) {
		    case 'actu':
			$actus = new Actus($pdo, $session->read('langue'));
			$actus_inf = $actus->isActuExist($news_id);
			$output .= nl2br($actus_inf['body']);
			break;
		    case 'video':
			$video = new Video($pdo, $session->read('langue'));
			$video_inf = $video->getVideoById($news_id);
			$output .= '<span class="label_member_block">' . $video_inf['title'] . '<span>' . PHP_EOL;
			$output .= '<span class="label_member_block">';
			$output .= '<iframe width="512" height="300" src="' . urldecode($video_inf['url']) . '" frameborder="0" allowfullscreen></iframe>';
			$output .= '</span>' . PHP_EOL;
			$output .= '<span>' . $video_inf['description'] . '</span>';
			break;
		    case 'music':
			//$music = new Music($pdo, $session->read('langue'));
			//$music_inf = $music->getMusicById($news_id);
			break;

		    case 'event':
			$event = new Event($pdo, $session->read('langue'));
			$event_inf = $event->isEventExist($news_id);
			$output .= '<span>'.$event_inf['title'].'</span>';
			$output .= nl2br($event_inf['body']);
			break;
		    case 'member':
			$member = new Members($pdo, $session->read('langue'));
			$member_inf = $member->getMembersById($news_id);
			$output .= '<span id="avatar_member"><img src="../public/media/image/' . $member_inf['picture'] . '" /></span>';
			$output .= '<span class="ligne_member">
				<span class="label_member">' . NAME . ' : </span>
				<span class="desc_member">' . $member_inf['name'] . '</span>
			    </span>';
			$output .= '<span class="ligne_member">
				<span class="label_member">' . FIRST_NAME . ' : </span>
				<span class="desc_member">' . $member_inf['firstname'] . '</span>
			    </span>';
			$output .= '<span class="ligne_member">
				<span class="label_member">' . NICK_NAME . ' : </span>
				<span class="desc_member">' . $member_inf['surname'] . '</span>
			    </span>';
			$output .= '<span class="ligne_member">
				<span class="label_member">' . BIRTHDAY . ' : </span>
				<span class="desc_member">' . $member_inf['birthday'] . '</span>
			    </span>';
			$output .= '<span class="ligne_member">
				<span class="label_member">' . INSTRUMENT . ' : </span>
				<span class="desc_member">' . $member_inf['instrument'] . '</span>
			    </span>';
			$output .= '<span class="ligne_member">
				<span class="label_member_block">' . SHORT_DESC . ' : </span>
				<span class="desc_member">' . $member_inf['short_desc'] . '</span>
			    </span>';
			$output .= '<span class="ligne_member">
				<span class="label_member_block">' . INFLUENCES . ' : </span>
				<span class="desc_member">' . $member_inf['influences'] . '</span>
			    </span>';
			break;
		    default:
			'<span>' . NO_RESULTS . '</span>';
			break;
		}
		echo $output;
		?>
	    </p>
	</div>
    </div>
</article>

