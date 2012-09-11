<?php
	require_once 'class/Members.php';
	
	$members = new Members($pdo,$session->read('langue'));
	$membersInformation = $members->getAllMembers();
	
	$tag_langue = isset($_SESSION['langue'])?$_SESSION['langue']:'fr';
?>

<div id="conteneur">
	<div id="switch_bio">
		<div id="members_switch">
		</div>
		<div id="general_switch">
		</div>
	</div>
	
	<!-- First page -->
	<div id="members_container">
		<?php
			foreach($membersInformation as $this_member){
		?>	
		<div id="<?php echo $this_member['name'] . '_' . $this_member['idMembers'];?>" class="member_container">
			<div class="haut_member">
				<div class="name_member">
					<?php
						echo $this_member['firstname'] . ' ' . $this_member['name'];
					?>
				</div>
			</div>
			<div class="bas_member">
			</div>
			<div class="member_desc">
				<div class="bio_member">
					<span class="label" style="font-weight:bold;"><?php echo NAME . BEFORE_TWO_POINT;?>: </span>
					<span class="label" style="color: #fff;"><?php echo $this_member['name']; ?></span><br/>
					
					<span class="label" style="font-weight:bold;"><?php echo FIRST_NAME . BEFORE_TWO_POINT;?>: </span>
					<span class="label" style="color: #fff;"><?php echo $this_member['firstname']; ?></span><br/>
					
					<span class="label" style="font-weight:bold;"><?php echo NICK_NAME . BEFORE_TWO_POINT;?>: </span>
					<span class="label" style="color: #fff;"><?php echo $this_member['surname']; ?></span><br/>
					
					<span class="label" style="font-weight:bold;"><?php echo BIRTHDAY . BEFORE_TWO_POINT;?>: </span>
					<span class="label" style="color: #fff;"><?php echo $this_member['birthday']; ?></span><br/>
					
					<span class="label" style="font-weight:bold;"><?php echo INSTRUMENT . BEFORE_TWO_POINT;?>: </span>
					<span class="label" style="color: #fff;"><?php echo $this_member['instrument']; ?></span><br/>
				</div>
			</div>
			<div class="more_about_him">
				<div class="more" style="font-weight:bold;"><?php echo INFLUENCES . BEFORE_TWO_POINT;?>: </div>
				<div class="more" style="color: #fff;"><?php echo $this_member['influences']; ?></div>
				
				<div class="more" style="font-weight:bold;"><?php echo SHORT_DESC . BEFORE_TWO_POINT;?>: </div>
				<div class="more" style="color: #fff;"><?php echo $this_member['short_desc']; ?></div>
				
				<div style="color: #7F554E;font-family:'Ubuntu-c';font-size: 13px;">
					Cliquez pour cacher la description
				</div>
				<div class="img_member">
					<img src="public/media/image/<?php echo $this_member['picture']; ?>" alt="<?php echo NAME . BEFORE_TWO_POINT;?>_picture" width="203px" />
				</div>
			</div>
		</div>
		
		<?php
			}
		?>
	</div>
</div>

<!-- Second page -->
<div id="bio_gen">
	<div class="big_title">
		Biographie
	</div>
</div>