<?php
require 'bootstrap.php';
require_once 'class/Header.php';

$header = new Header($pdo, $session->read('langue'));
$headerInformation = $header->getAllHeaderInformation();
// Récupération de l'id 
$news_id = isset($_GET['id']) ? $_GET['id'] : 0;
//Type de news récolter
$news_type = isset($_GET['type']) ? $_GET['type'] : '';
$output = "";
// Construction de la réponse en fonction du type de news demandé
switch ($news_type) {
	case 'news':
		require 'class/Actus.php';
		$actus = new Actus($pdo, $session->read('langue'));
		$actus_inf = $actus->isActuExist($news_id);
		$output .= '<div class="titre">'.$actus_inf['title'].'</div>';
		$output .= nl2br($actus_inf['body']);
		$meta_og_title = $actus_inf['title'];
		$meta_og_description = $actus_inf['body'];
		$meta_og_url = $news_type.'-'.$news_id;
		break;
	case 'video':
		require 'class/Video.php';
		$video = new Video($pdo, $session->read('langue'));
		$video_inf = $video->getVideoById($news_id);
		$output .= '<span class="label_member_block">' . $video_inf['title'] . '<span>' . PHP_EOL;
		$output .= '<span class="label_member_block">';
		$output .= urldecode($video_inf['url']);
		$output .= '</span>' . PHP_EOL;
		$output .= '<span>' . $video_inf['description'] . '</span>';
		$meta_og_title = $video_inf['title'];
		$meta_og_description = $video_inf['description'];
		$meta_og_url = $news_type.'-'.$news_id;
		break;
	case 'music':
		header('Location: http://passanger.fr/'.$session->read('langue').'-sound');
	case 'event':
	        require 'class/Event.php';
		$event = new Event($pdo, $session->read('langue'));
		$event_inf = $event->isEventExist($news_id);
		$output .= '<div class="titre">'.$event_inf['title'].'</div>';
		$output .= nl2br($event_inf['body']);
		$meta_og_title = $event_inf['title'];
		$meta_og_description = $event_inf['body'];
		$meta_og_url = $news_type.'-'.$news_id;
		break;
	case 'member':
		require 'class/Members.php';
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
		$meta_og_title = $member_inf['name'].' '.$member_inf['firstname'];
		$meta_og_description = $member_inf['short_desc'];
		$meta_og_url = $news_type.'-'.$news_id;
		break;
	default:
		header('Location: http://passanger.fr/');
		break;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
	<title><?php print $headerInformation['title']. ' :: ' . $meta_og_title; ?></title>
        <?php
	    // La page à modifier pour inclure le CSS le JS et les balises meta
            include("page/meta-share.phtml");
        ?>
    </head>
    <body>
	<div id="global">
	     <div id="corps">
		<?php
		    // La page a modifier pour le header
		    include("page/header.phtml");
		    if( $is_on_mobile )
			echo '<div id="content-starting"></div>';
		 
		?>
		 <div id="conteneur-news">
		    <div id="article">
			   <div class="article_content">
			       <article>
				   <div class="article_block">
				       <div class="content_article">
					   <p>
					       <?php echo $output;?>
					   </p>
				       </div>
				   </div>
			       </article>
			  </div>
		    </div>
		 </div>
	     </div>
	<?php
		// La page a modifier pour le footer
		include("page/footer.phtml");
	?>
	</div>
    </body>
</html>