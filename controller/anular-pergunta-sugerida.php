<?php

require_once '../class/pergunta.php';

$id= $_GET['id_pergunta'];

$pergunta = new Pergunta($id);

$pergunta->anular_pergunta();

header('Location: ../view/listar_pergunta_publicada.php');

?>