<?php

require_once '../class/Session.php';
require_once '../class/Mail.php';

$session = new Session();

//Récupération des données 
$nomProvenance = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : null;
$mailProvenance = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : null;
$messageProvenance = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : null;

// Stockage en session des informations 
// en prévention d'une erreur pour éviter à l'utilisateur de tout retaper 
// permet de préremplir les champs du formulaire d'envoi en cas d'erreur ou dysfonctionnement
$session->write('contact_nom', $nomProvenance);
$session->write('contact_mail', $mailProvenance);
$session->write('contact_message', $messageProvenance);

//destinataire(s)
$to = "";
// sujet facultatif
$subject = "";

// Si on a toutes les données , envoie du mail 
if ($nomProvenance && $mailProvenance && $messageProvenance) {
    // test si l'email est valide
    $isEmail = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
    if (preg_match($isEmail, $mailProvenance)) {

	$mail = new Mail($to, $nomProvenance, $mailProvenance, $messageProvenance);
	$mail->setSubject($subject);
	// Envoie du mail + message d'erreur ou confirmation
	if ($mail->sendMail()) {
	    $session->write('mail_statement', 'L \'envoi de l\'email s\'est correctemnt déroulé');
	    // Supprime les sessions de préremplissage du formulaire 
	    $session->write('contact_nom', '');
	    $session->write('contact_mail', '');
	    $session->write('contact_message', '');
	} else {
	    $session->write('mail_statement', 'Un problème est survenu, réessayez S.V.P');
	}
    }
    // redirection vers la page parente
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    $session->write('mail_statement', 'Un problème est survenu, réessayez S.V.P');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
    