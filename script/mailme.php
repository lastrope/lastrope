<?php
     // Destinataires
     $to = 'xxx@xxx.xx';

     // Sujet
     $subject = '_subject_';
	 
	 // R�cup�ration des donn�es
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
	 
     // Pour envoyer un mail HTML, l'en-t�te Content-type doit �tre d�fini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

     // En-t�tes additionnels
     $headers .= 'To: Nom <xxx@xxx.xx>' . "\r\n";
     $headers .= 'From: FREAKZ_' . $nomProvenance . ' <' . $mailProvenance . '>' . "\r\n";

     // Envoi
     mail($to, $subject, $message, $headers);

	header('location: ../index.php?mail=send');
?>