<div id="conteneur">
	<div id="social">
		<ul class="ch-grid">
			<li>
				<div class="ch-item ch-img-1">
					<div class="ch-info">
						<h3><a href="#">Facebook</a></h3>
					</div>
				</div>
			</li>
			<li>
				<div class="ch-item ch-img-2">
					<div class="ch-info">
						<h3><a href="http://twitter.com/PassangerBand">Twitter</a></h3>
					</div>
				</div>
			</li>
			<li>
				<div class="ch-item ch-img-3">
					<div class="ch-info">
						<h3><a href="#">Noomiz</a></h3>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<?php 
	    if(isset($_SESSION['mail_statement_confirm']) && $_SESSION['mail_statement_confirm'] != ""){ 
		echo "<p id='mail_confirm'>" , $_SESSION['mail_statement_confirm'] , "</p>";
	    }else if(isset($_SESSION['mail_statement_error']) && $_SESSION['mail_statement_error'] != ""){
		echo "<p id='mail_error'>" , $_SESSION['mail_statement_error'] , "</p>";
	    }
	?>
	<div id="contact_page">
		
		
		<form id="form_contact" action="script/mailme.php" method="post">
			<h1><?php echo CONTACT_US; ?></h1>
			<label class="label_form" for="nom"><?php echo NAME . BEFORE_TWO_POINT;?>:</label>
			<input type="text" name="nom" id="nom" value="<?php echo isset($_SESSION['contact_nom'])?$_SESSION['contact_nom']:"" ?>" placeholder="<?php echo PL_NAME; ?>" required/>
			<span class="tooltip"><?php echo NAME_TOOLTIP;?></span><br /><br /><br />

			<label class="label_form" for="mail"><?php echo MAIL . BEFORE_TWO_POINT;?>:</label>
			<input type="text" name="mail" id="mail" value="<?php echo isset($_SESSION['contact_mail'])?$_SESSION['contact_mail']:"" ?>" pattern="[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]+" placeholder="<?php echo PL_EMAIL; ?>" required />
			<span class="tooltip"><?php echo MAIL_TOOLTIP;?></span><br /><br /><br />

			<label class="label_form" for="message"><?php echo MESSAGE . BEFORE_TWO_POINT;?>:</label>
			<textarea name="message" id="message" rows="10" cols="30"><?php echo isset($_SESSION['contact_message'])?$_SESSION['contact_message']:"" ?></textarea><br />

			<input class="button" type="submit" value="<?php echo SEND;?>" />
		</form>
	</div>
</div>