<div id="contact_form">
    <?php echo isset($_SESSION['mail_statement'])?$_SESSION['mail_statement']:null; ?>
    <form action="script/mailme.php" method="post">
        <label for="nom">Nom</label><br />
        <input name="nom" id="nom" value="<?php echo isset($_SESSION['contact_nom'])?$_SESSION['contact_nom']:"" ?>"/><br />
        <label for="mail">email :</label><br />
        <input name="mail" id="mail" value="<?php echo isset($_SESSION['contact_mail'])?$_SESSION['contact_mail']:"" ?>" /><br />
        <label for="message">Message</label><br />
        <textarea name="message" id="message" rows="10" cols="30"><?php echo isset($_SESSION['contact_message'])?$_SESSION['contact_message']:"" ?></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>