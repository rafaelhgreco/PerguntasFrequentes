<?php 
require_once 'usuario-verifica.php';
session_start();
if(!isset($_SESSION['usuario_logado'])){
    //Voce n tem acesso a esta funcionalidade
    header('Location: user/usuario-nao-logado.php');
}

?>