<div id="conteneur">
	<div id="social">
	</div>
	
	<div id="contact_page">
		<?php echo isset($_SESSION['mail_statement'])?$_SESSION['mail_statement']:null; ?>
		
		<form id="form_contact" action="script/mailme.php" method="post">
			<fieldset>
			<legend>Contactez-nous !</legend>
				<label class="label_form" for="nom"><?php echo NAME . BEFORE_TWO_POINT;?>:</label><br />
				<input name="nom" id="nom" value="<?php echo isset($_SESSION['contact_nom'])?$_SESSION['contact_nom']:"" ?>" placeholder="Votre nom" required/><br />
				
				<label class="label_form" for="mail"><?php echo MAIL . BEFORE_TWO_POINT;?>:</label><br />
				<input name="mail" id="mail" value="<?php echo isset($_SESSION['contact_mail'])?$_SESSION['contact_mail']:"" ?>" pattern="[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]+" placeholder="Votre email" required /><br />
				
				<label class="label_form" for="message"><?php echo MESSAGE . BEFORE_TWO_POINT;?>:</label><br />
				<textarea name="message" id="message" rows="10" cols="30"><?php echo isset($_SESSION['contact_message'])?$_SESSION['contact_message']:"" ?></textarea><br />
				
				<input class="button" type="submit" value="Envoyer" />
			</fieldset>
		</form>
	</div>
	
	<div id="useful_links">
	</div>
</div>