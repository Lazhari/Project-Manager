<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Envoyer un email lors de l'inscription 
 *@param string $to adress de distinataire
 *@param string $nom le nom de membre
 *@param string $pass son mot de pass
 */
if ( ! function_exists('mailSignUp'))
{
	function mailSignUp($to,$nom,$pass)
	{
		// Sujet
		$subject = 'Inscription Au ProjectManager';

		//message 
		$message = '

					<!DOCTYPE HTML>
								<html lang="en-US">
								<head>
									<meta charset="UTF-8">
									<title>Inscription à ProjectManager</title>
									<style type="text/css">
								       .content {
								    border: 10px solid #AAA;
								    padding: 0px 40px 5px 40px;
								    width: 1024px;
								    margin: auto;
								}


									</style>
								</head>
								<body>
								    <div class="content">
								         <a href="'.base_url().'" style="text-decoration:none;"><h1 style="text-align:center;color: #AE432E;font-size:30px;text-shadow:1px 1px 1px #000;">ProjectManager</h1></a>
									        <hr>
											<h1 style="text-align:center;color: #AE432E;font-size:21px;">'.$subject.'</h1>
											<p>Bonjour '.$nom.
											'vous venez de s\'inscrire depuit quelques instant sur la plate-forme ProjectManager avec l\'email : <strong> '.$to.'</strong> et le mot de passe : <strong> '.$pass.'</strong></p>
											<p>Cordialement.</p>
											<hr>
								        <p style="text-align:center;color: #AE432E;font-size:14px;">Copyright : 2012-2013</p>
								    </div>
								       
								</body>
								</html>';
		// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     // En-têtes additionnels
     $headers .= 'To:'.$to. "\r\n";
     $headers .= 'From: ProjectManager <lazharimohammed@gmail.com>' . "\r\n";
     // Envoi
     mail($to, $subject, $message, $headers);
	}
}

/**
 * Envoyer une invitation à un membre
 *@param string $to adress de distinataire
 *@param string $message le message de membre
 *@param string $from l'email de l'inventeur
 */
if ( ! function_exists('mailInvitation'))
{
	function mailInvitation($to,$message,$from)
	{
		// Sujet
		$subject = 'Invitation Au ProjectManager  par Monsieur '.$from;

		//message 
		$message = '
					<!DOCTYPE HTML>
					<html lang="en-US">
					<head>
						<meta charset="UTF-8">
						<title>Inscription à ProjectManager</title>
						<style type="text/css">
					       .content {
					    border: 10px solid #AAA;
					    padding: 0px 40px 5px 40px;
					    width: 1024px;
					    margin: auto;
					}


						</style>
					</head>
					<body>
					    <div class="content">
					         <a href="'.base_url().'" style="text-decoration:none;"><h1 style="text-align:center;color: #AE432E;font-size:30px;text-shadow:1px 1px 1px #000;">ProjectManager</h1></a>
						        <hr>
								<h1 style="text-align:center;color: #AE432E;font-size:21px;">'.$subject.'</h1>
								<p><strong>Message envoyer par '.$from.': </strong> '.$message.'</p>
								<p><a href="'.site_url('connexion').'" title="">Lien d\'inscription</a></p>
								<br>
								<hr>
					        <p style="text-align:center;color: #AE432E;font-size:14px;">Copyright : 2012-2013</p>
					    </div>
					       
					</body>
					</html>';

		// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

     // En-têtes additionnels
     $headers .= 'To:'.$to. "\r\n";
     $headers .= 'From: ProjectManager <lazharimohammed@gmail.com>' . "\r\n";
     // Envoi
     mail($to, $subject, $message, $headers);
	}
}

