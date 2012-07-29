<?php
     // Destinataires
     $to = 'xxx@xxx.xx';

     // Sujet
     $subject = '_subject_';
	 
	 // Récupération des données
	 $nomProvenance = htmlspecialchars($_POST['nom']);
	 $mailProvenance = htmlspecialchars($_POST['mail']);
	 $messageProvenance = htmlspecialchars($_POST['message']);

     // Message
     $message = '
     <html>
		<head>
			<title>Demande de contact par ' . $nomProvenance . '</title>
		</head>
		<body>
			<p>' . $messageProvenance . '
			</p>
		</body>
    </html>
    ';
	 
     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

     // En-têtes additionnels
     $headers .= 'To: Nom <xxx@xxx.xx>' . "\r\n";
     $headers .= 'From: FREAKZ_' . $nomProvenance . ' <' . $mailProvenance . '>' . "\r\n";

     // Envoi
     mail($to, $subject, $message, $headers);

	header('location: ../index.php?mail=send');
?>