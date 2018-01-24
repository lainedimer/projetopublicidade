<?php

$quebralinha = "\n";
$emailsender = "tauti@tauti.canalcatarinense.com.br";
$nomeremetente = "Contato Tauti";
$emaildestinatario = "tauti@tauti.canalcatarinense.com.br";
$assunto = "Contato Tauti";

$nome = $_POST["nome"];
$email = $_POST["email"];
$msg = $_POST["msg"];
//Import PHPMailer classes into the global namespace
<<<<<<< HEAD
$mensagemHTML = '<p> Teste de funcao PHP Mail (); !</p>
<p>'.$nome.'</p>
<p>'.$email.'</p><br/>
<p>'.$msg.'</p></br>';

$headers  = "MIME-Version: 1.0".$quebralinha;
$headers .= 'Content-type: text/html; charset=iso-8859-1'.$quebralinha;
$headers .= "From: ".$emailsender.$quebralinha;
  //$headers .= "Bcc: $EmailPadrao\r\n";

$enviaremail = mail($emaildestinatario, $assunto, $mensagemHTML, $headers,"-r".$emailsender);
=======
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.tauti.com.br';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tauti@tauti.com.br';                 // SMTP username
    $mail->Password = 'admintauti2018';                           // SMTP password   
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tauti@tauti.com.br','');   // Add a recipient
    $mail->addAddress('tauti@tauti.com.br','');               // Name is optional

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Fale conosco (tauti.com.br)';
    $mail->Body    = $msg."<br />\nEmitente: ".$email;
    $mail->AltBody = $email;

    $mail->send();
    $enviado = 'Message has been sent';
    header('Location: index.php?enviado=1#contato');    
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    header('Location: index.php?enviado=0#contato');
>>>>>>> b8913251eaaa7269b11c2cf5d67e64e3df62dbf6

 if($enviaremail){
   $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
  header('Location: index.php?enviado=1#contato');    
 } else {
   $mgm = "ERRO AO ENVIAR E-MAIL!";
   echo "";
   header('Location: index.php?enviado=0#contato');
}

?>
