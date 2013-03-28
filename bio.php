<?php
require_once 'class/Members.php';
require_once 'class/Bio.php';

$members = new Members($pdo, $session->read('langue'));
$bio = new Bio($pdo, $session->read('langue'));

$membersInformation = $members->getAllMembers();
$bioInformation = $bio->getAllBio();

$tag_langue = isset($_SESSION['langue']) ? $_SESSION['langue'] : 'fr';
?>

<div id="conteneur">
    <div id="switch_bio">
	<div id="switch" class="bottom">
	</div>
	
    </div>

    <!-- First page -->
    <div id="members_container">
	<?php
	$cpt = 0;
	foreach ($membersInformation as $this_member) {
	    ?>	
    	<div id="<?php echo $this_member['name'] . '_' . $this_member['idMembers']; ?>" class="member_container">
    	    <div class="haut_member">
    		<h2 class="name_member">
			<?php
			echo $this_member['firstname'] . ' ' . $this_member['name'];
			?>
    		</h2>
    	    </div>
    	    <div class="bas_member">
    		<div class="anim-guitare-<?php echo $cpt; ?>">
			<?php
			if ($cpt == 0) {
			    ?>
			    <img style="margin-top: 10px;" src="public/media/image/rg1570.png" alt="guitare ibanez rg 1570 de thibault" />
			    <?php
			} else if ($cpt == 1) {
			    ?>
			    <img style="margin-top: 10px;" src="public/media/image/lag.png" alt="guitare lag de franck" />
			    <?php
			} else if ($cpt == 2) {
			    ?>
			    <img style="margin-top: 10px;" src="public/media/image/sr.png" alt="bass ibanez de paco" />
			    <?php
			} else if ($cpt == 3) {
			    ?>
			    <img style="margin-top: 10px;" src="public/media/image/baguette.png" alt="baguettes de batterie de camille" />
			    <?php
			} else if ($cpt == 4) {
			    ?>
			    <img style="margin-top: 10px;" src="public/media/image/micro.png" alt="micro shure de Tatiana" />
			    <?php
			}
			?>
    		</div>
    	    </div>
    	    <div class="member_desc">
    		<div class="bio_member">
    		    <span class="label" style="font-weight:bold;"><?php echo NAME . BEFORE_TWO_POINT; ?>: </span>
    		    <span class="label" style="color: #fff;"><?php echo $this_member['name']; ?></span><br/>

    		    <span class="label" style="font-weight:bold;"><?php echo FIRST_NAME . BEFORE_TWO_POINT; ?>: </span>
    		    <span class="label" style="color: #fff;"><?php echo $this_member['firstname']; ?></span><br/>

    		    <span class="label" style="font-weight:bold;"><?php echo NICK_NAME . BEFORE_TWO_POINT; ?>: </span>
    		    <span class="label" style="color: #fff;"><?php echo $this_member['surname']; ?></span><br/>

    		    <span class="label" style="font-weight:bold;"><?php echo BIRTHDAY . BEFORE_TWO_POINT; ?>: </span>
    		    <span class="label" style="color: #fff;"><?php echo $this_member['birthday']; ?></span><br/>

    		    <span class="label" style="font-weight:bold;"><?php echo INSTRUMENT . BEFORE_TWO_POINT; ?>: </span>
    		    <span class="label" style="color: #fff;"><?php echo $this_member['instrument']; ?></span><br/>
    		</div>
    	    </div>
    	    <div class="more_about_him">
    		<div class="more" style="font-weight:bold;"><?php echo INFLUENCES . BEFORE_TWO_POINT; ?>: </div>
    		<div class="more" style="color: #fff;"><?php echo $this_member['influences']; ?></div>

    		<div class="more" style="font-weight:bold;"><?php echo SHORT_DESC . BEFORE_TWO_POINT; ?>: </div>
    		<div class="more" style="color: #fff;"><p><?php echo $this_member['short_desc']; ?></p></div>

    		<div style="color: #7F554E;font-family:'Ubuntu-c';font-size: 13px;">
    		    Cliquez pour cacher la description
    		</div>
    	    </div>
    	</div>

	    <?php
	    $cpt++;
	}
	?>
    </div>
</div>

<!-- Second page -->
<div id="bio_gen">
    <h1 class="big_title">
	Biographie
    </h1>
    <div class="bubble_container">
	<?php
	foreach ($bioInformation as $thisBio) {
	    ?>
    	<div class="bubble_period" year="<?php echo $thisBio['year'] ?>">
		<?php
		echo $thisBio["year"];
		$tampax[$thisBio["year"]] = nl2br($thisBio["description"]);
		?>

    	</div>
	    <?php
	}
	?>
	<div style="clear:both;"></div>
	<?php
	foreach ($tampax as $key=>$bubble) {
	    ?>
    	<div class="bubble_period_hover" id="bubble-<?php echo $key ?>">
    	    <p>
		    <?php
		    echo $bubble;
		    ?>
    	    </p>
    	</div>

	<?php } ?>
	<div style="clear:both;"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
	$('.bubble_period').hover(function(){
	    var year = $(this).attr('year');
	    $("#bubble-"+year).show();
	},function(){
	    $('.bubble_period_hover').hide();
	});
    });
</script>