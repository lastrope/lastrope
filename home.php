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
			<div class="article_block">
				<div class="titre"><?php echo $this_actu['title']; ?></div>
				<div class="content_article">
					<p>
						<?php echo $this_actu['body']; ?>
					</p>
				</div>
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
			$compteur = 1;
			foreach($eventInformation as $this_event){
		?>
		<section id="event-<?php echo $compteur; ?>" <?php if($compteur == 1)echo "class='active_carousel'"; ?>>
		<div class="section_block">
			<div class="titre">
				<?php echo $this_event['title']; ?>
			</div>
			<div class="content_event">
				<?php echo $this_event['short_desc']; ?>
			</div>
			<div class="date_event">
				<?php echo $this_event['date']; ?>
			</div>
		</div>
		</section>
		<?php 
			
			    $compteur++;
			}
		?>
	</div>
</div>
<script type="text/javascript">
	function eventCarousel(section){
		$('#event section').hide();
		var id = $('section.active_carousel').attr('id');
		var id_number = id.split('-');
		
		if(id_number[1] < section && id_number[1] != "" ){
			$('section.active_carousel').next().addClass('active_carousel').fadeIn(500);
			$('section.active_carousel').each(function(){
				$(this).prev().removeClass('active_carousel');
			});
		}else if(section == id_number[1] ){
			$('section.active_carousel').removeClass('active_carousel');
			$('#event-1').addClass('active_carousel').fadeIn(500);
		}
    }
    $(document).ready(function(){
		var nb_section = 0;
		$('#event section').each(function(){
			nb_section++;
		});
		if(nb_section > 1){
			setInterval("eventCarousel("+nb_section+")",4000);
		}
    });
</script>