<?php 
require_once "../class/pergunta.php";

$pergunta_recebida = new pergunta();
$pergunta_recebida -> nome_solicitante = $_POST['nome'];
$pergunta_recebida -> pergunta = $_POST['pergunta'];
$pergunta_recebida -> email_solicitante = $_POST['email'];
$pergunta_recebida->receber_pergunta();
header('Location: ../index.php');


?>