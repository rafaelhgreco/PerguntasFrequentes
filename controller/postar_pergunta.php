<?php 
require_once "../class/pergunta.php";

$pergunta_nova = new pergunta();
$pergunta_nova -> id_pergunta = $_POST['id_pergunta'];
$pergunta_nova -> pergunta = $_POST['pergunta'];
$pergunta_nova -> resposta = $_POST['resposta'];
$pergunta_nova -> adm_id = $_POST['seladm'];
$pergunta_nova -> status_pergunta = 'RES';
$pergunta_nova ->postar_pergunta();
header('Location: ../view/listar_pergunta_publicada.php');


?>