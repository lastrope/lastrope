<?php
	require_once 'class/Actus.php';
	require_once 'class/Event.php';
	$actus = new Actus($pdo,$session->read('langue'));
	$actusInformation = $actus->getLastFiveActus();
	$tag_langue = isset($_SESSION['langue'])?$_SESSION['langue']:'fr';
	$event = new Event($pdo,$session->read('langue'));
	$eventInformation = $event->getLastFiveEvent();
?>
<div id="conteneur">
	<div id="welcome">
		<p>
			<?php echo WELCOME_ON_WEBSITE;?>
		</p>
	</div>
	
	<div id="article" class="jScrollbar3">
		<div class="jScrollbar_mask">
			<?php
				// On affiche les 5 dernières actus sur la page d'accueil
				foreach($actusInformation as $this_actu){
			?>
			<article>
				<div class="titre"><?php echo $this_actu['title']; ?></div>
				<div class="content_article">
					<p>
						<?php echo $this_actu['body']; ?>
					</p>
				</div>
			</article>
			<?php
				}
			?>
		</div>
		
		<div class="jScrollbar_draggable">
			<a href="#" class="draggable"></a>
		</div>
			
		<div class="clr"></div>
	</div>
	
	<div id="event">
		<?php
			//affichage des 5 récents events ( concerts , etc ... )
			foreach($eventInformation as $this_event){
		?>
		<section>
			<div class="titre">
				<?php echo $this_event['title']; ?>
			</div>
			<div class="content_event">
				<?php echo $this_event['short_desc']; ?>
			</div>
			<div class="date_event">
				<?php echo $this_event['date']; ?>
			</div>
		</section>
		<?php 
			}
		?>
	</div>
</div>