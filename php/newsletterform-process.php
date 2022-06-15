<?php
$errorMSG = "";

$tipo = $_POST["tipo"];
$nome = $_POST["nome"];
$tel = $_POST["tel"];

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

$EmailTo = "foxsoftware21@gmail.com";
$Subject = $tipo;

// prepare email body text
$Body = "";
$Body .= "Nome: ";
$Body .= $nome;
$Body .= "Celular: ";
$Body .= $tel;
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Terms: ";
$Body .= $terms;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Algo deu errado :(";
    } else {
        echo $errorMSG;
    }
}
?>