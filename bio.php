<?php
	require_once 'class/Members.php';
	
	$members = new Members($pdo,$session->read('langue'));
	$membersInformation = $members->getAllMembers();
	
	$tag_langue = isset($_SESSION['langue'])?$_SESSION['langue']:'fr';
?>

<div id="conteneur">
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
			<div style="member_desc">
				<span class="label" style="font-weight:bold;"><?php echo NAME . BEFORE_TWO_POINT;?>: </span>
				<span class="label" style="color: #fff;"><?php echo $this_member['name']; ?></span><br/>
				
				<span class="label" style="font-weight:bold;"><?php echo FIRST_NAME . BEFORE_TWO_POINT;?>: </span>
				<span class="label" style="color: #fff;"><?php echo $this_member['firstname']; ?></span><br/>
				
				<span class="label" style="font-weight:bold;"><?php echo NICK_NAME . BEFORE_TWO_POINT;?>: </span>
				<span class="label" style="color: #fff;"><?php echo $this_member['birthday']; ?></span><br/>
				
				<span class="label" style="font-weight:bold;"><?php echo INSTRUMENT . BEFORE_TWO_POINT;?>: </span>
				<span class="label" style="color: #fff;"><?php echo $this_member['instrument']; ?></span><br/>
				
			</div>
		</div>
		<?php
			}
		?>
	</div>
</div>