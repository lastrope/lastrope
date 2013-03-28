<?php
	require_once 'class/Actus.php';
	require_once 'class/Event.php';
	
	$actus = new Actus($pdo,$session->read('langue'));
	$actusInformation = $actus->getLastFiveActus();
	$event = new Event($pdo,$session->read('langue'));
	$eventInformation = $event->getLastFiveEvent();
	
	$tag_langue = isset($_SESSION['langue'])?$_SESSION['langue']:'fr';
?>

<div id="conteneur">
	<div id="welcome">
		<h1>
			<?php echo WELCOME_ON_WEBSITE;?>
		</h1>
		<img id="projo-left-to-right" src="public/media/image/lumiere2.png" alt="lumiere gauche" />
	</div>
	
	<div id="article">
	    <h1><?php echo LAST_FIVE_ARTICLE; ?></h1>
	    <?php
		    // On affiche les 5 dernières actus sur la page d'accueil
		    foreach($actusInformation as $this_actu){
	    ?>
	    <article>
	    <div class="article_block">
		    <h2 class="titre"><?php echo $this_actu['title']; ?></h2>
		    <div class="content_article">
			    <p>
				    <?php echo nl2br($this_actu['body']); ?>
				    <?php echo "<span class='published'>".DATE_PUBLISHED." " , date("d/m/Y ".AT." H:i:s",$this_actu['date']) , "</span>"; ?>
			    </p>
		    </div>
	    </div>
	    </article>
	    <?php
		    }
	    ?>
			
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
			<h2 class="titre">
				<?php echo $this_event['title']; ?>
			</h2>
			<div class="content_event">
				<?php echo $this_event['body']; ?>
			</div>
			<div class="date_event">
				<?php echo "<p class='published'>".DATE_PUBLISHED." " , date("d/m/Y ".AT." H:i:s",$this_event['date']) , "</p>"; ?>
			</div>
		</div>
		</section>
		<?php 
			
			    $compteur++;
			}
		?>
	    <img id="projo-right-to-left" src="public/media/image/lumiere.png" alt="lumiere droite" />
	</div>
	<div class="clear"></div>
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