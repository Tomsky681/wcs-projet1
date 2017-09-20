<?php

// Vérification des saisies utilisateur

$erreurs = array();

/* Nom (nom)
 * Critère(s) de validation :
 * - contient au moins deux caractères
 */
if(isset($_POST['nom']) && iconv_strlen(strip_tags($_POST['nom']), 'UTF-8') > 1)
{
	$nom = strip_tags($_POST['nom']);
}
else if(isset($_POST['nom']))
{
	$erreurs['nom'] = "Le nom doit contenir au moins deux caractères";
}

/* Email (email)
 * Critère(s) de validation :
 * - doit ressembler à une-chaine-de_caracteres@une-chaine-de_caracteres.une-chaine-de_caracteres
 * - chaque chaîne de caractères doit être composée d'au moins deux caractères alphanumériques
 */
if(isset($_POST['email']) && preg_match('/^[[:alnum:]]([-\w]){1,64}\@[[:alnum:]-]{2,32}(\.[a-z]{2,10}){1,}$/', strip_tags($_POST['email'])))
{
	$email = strip_tags($_POST['email']);
}
else if(isset($_POST['email']))
{
	$erreurs['email'] = "L'adresse email ne semble pas valide";
}

/* Message (message)
 * Critère(s) de validation :
 * - contient au moins dix caractères
 */
if(isset($_POST['message']) && iconv_strlen(strip_tags($_POST['message']), 'UTF-8') > 9)
{
	$message = strip_tags($_POST['message']);
}
else if(isset($_POST['message']))
{
	$erreurs['message'] = "Le message doit contenir au moins dix caractères";
}

?>
