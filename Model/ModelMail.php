<?php
// Une partie du code a été pris sur : https://www.berejeb.com/2009/09/envoyer-des-mails-avec-phpmailer-et-le-smtp-de-gmail/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\Users\Florent\PHPMailerMaster\PHPMailerMaster\src\Exception.php';
/* Classe-PHPMailer */
require 'C:\Users\Florent\PHPMailerMaster\PHPMailerMaster\src\PHPMailer.php';
/* Classe SMTP nécessaire pour établir la connexion avec un serveur SMTP */
require 'C:\Users\Florent\PHPMailerMaster\PHPMailerMaster\src\SMTP.php';
$mail = new PHPMailer(TRUE);
try {
    // Tentative de création d’une nouvelle instance de la classe PHPMailer
    $mail = new PHPMailer (true);
// (…)
} catch (Exception $e) {
    echo "Mailer Error: ".$mail->ErrorInfo;
}


/**
 * Envoyer un mail de vérification par mail
 *
 * @param string $to sert à définir le destinataire du mail
 * @param string $from sert à définir l'envoyeur du mail
 * @param string $from_name sert à définir le nom de l'envoyeur du mail
 * @param string $subject sert à définir l'objet du mail
 * @param string $body sert à définir le contenu du mail
 *
 * @return bool|string
 */
function envoieMail(string $to, string $from, string $from_name, string $subject, string $body): bool|string
{
    $mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
    $mail->IsSMTP(); // active SMTP
    $mail->SMTPDebug = 2;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
    $mail->SMTPAuth = true;  // Authentification SMTP active
    $mail->SMTPSecure = 'tls'; // Gmail REQUIERT Le transfert securise
    $mail->Host = "tls://smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = 'supersae59@gmail.com';
    $mail->Password = 'jxvt dzqq saie yyhn';
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        return 'Mail error: '.$mail->ErrorInfo;
    } else {
        return true;
    }
}

