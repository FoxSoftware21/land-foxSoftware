<?php
$errorMSG = "";

//Variáveis
$nome = $_POST['nome'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];
$tel = $_POST["tel"];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

//Compo E-mail
$arquivo = "
   <html>
     <p><b>Nome: </b>$nome</p>
     <p><b>E-mail: </b>$email</p>
     <p><b>Celular: </b>$tel</p>
     <p><b>Tipo: </b>$tipo</p>
     <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
   </html>
 ";

//Emails para quem será enviado o formulário
$destino = "foxsoftware21@gmail.com";
$assunto = "Contato pelo Site";

//Este sempre deverá existir para garantir a exibição correta dos caracteres
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: $nome <$email>";

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["terms"])) {
    $errorMSG = "Terms is required ";
} else {
    $terms = $_POST["terms"];
}

// send email
$success = mail($destino, $assunto, $arquivo, $headers);

// redirect to success page
if ($success && $errorMSG == "") {
    echo "success";
} else {
    if ($errorMSG == "") {
        echo "Algo deu errado :(";
    } else {
        echo $errorMSG;
    }
}
