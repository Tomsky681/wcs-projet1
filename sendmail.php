<?php

// From
$from	= 'gregory@nosheep.fr';

// Paramètres
$param= "-f $from";

// Headers
$headers[]		= 'MIME-Version: 1.0';
$headers[]		= 'Content-type: text/html; charset=UTF-8';
$headers[]		= 'X-Mailer: PHP/'.phpversion();
$headers[]		= "From: VéloTour <$from>";
$headers[]		= 'Date: '.date('r (T)');

// Message d(es)u destinataire(s)
$to['gregory']= $from;
$to['thomas']	= 'thky@outlook.fr';
$sujet				= "$nom vous adresse un message depuis le site VéloTour";
$contenu			= "
<html>
	<head>
		<title>$sujet</title>
	</head>
	<body>
		<p>Bonjour,</p>
		<p>$nom [ $email ] vous adresse le message suivant depuis le site VéloTour.</p>
		<p>".str_replace("\r\n", '<br>', $message)."</p>
	</body>
</html>
";
mail(implode(", ", $to), $sujet, $contenu, implode("\r\n", $headers), $param);

// Message récapitulatif à l'expéditeur
$to['visiteur']	= $email;
$sujet					= "Votre message a bien été envoyé à l'équipe de VéloTour";
$contenu				= "
<html>
	<head>
		<title>$sujet</title>
	</head>
	<body>
		<p>Bonjour $nom,</p>
		<p>Le message suivant a été adressé à l'équipe de VéloTour.</p>
		<p>".str_replace("\r\n", '<br>', $message)."</p>
		<p>Bien à vous, l'équipe VéloTour.<br><br><img width=\"150\" src=\"https://get.nosheep.fr/pic/velotour-logo-color.png\" alt=\"Logo VeloTour\"></p>
	</body>
</html>
";
mail($to['visiteur'], $sujet, $contenu, implode("\r\n", $headers), $param);

?>
