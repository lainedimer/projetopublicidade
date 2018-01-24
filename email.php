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
$mensagemHTML = '<p> Teste de funcao PHP Mail (); !</p>
<p>'.$nome.'</p>
<p>'.$email.'</p><br/>
<p>'.$msg.'</p></br>';

$headers  = "MIME-Version: 1.0".$quebralinha;
$headers .= 'Content-type: text/html; charset=iso-8859-1'.$quebralinha;
$headers .= "From: ".$emailsender.$quebralinha;
  //$headers .= "Bcc: $EmailPadrao\r\n";

$enviaremail = mail($emaildestinatario, $assunto, $mensagemHTML, $headers,"-r".$emailsender);

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
