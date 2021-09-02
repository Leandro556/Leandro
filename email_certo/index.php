<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);

$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'leandrobertocchi1@gmail.com';
    $mail->Password = 'dtllofugreppmcmh';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    

    $mail->setFrom('dn3316857@gmail.com');
    $mail->addAddress('dn3316857@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Inscricao adicionada';
    $mail->Body = 'Nome: '.$nome."\r\n".
                  'Email: '.$email."\r\n";
    

    if ($mail->send()){
        require_once('email_true.html');
    } else {
        require_once('email_false.html');
    }
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?>