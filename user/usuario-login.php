<?php 
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM tb_adm WHERE usuario='{$usuario}' and senha='{$senha}' ;";

include "../conexao.php";
$resultado = $conexao->query($sql);
$linha = $resultado->fetch();
$usuario_logado = $linha['usuario'];

if($usuario_logado == null){
    //Usuario senha invalida
    header('Location: ../user/usuario-erro.php');
}
else{
    session_start();
    $_SESSION['usuario_logado'] = $usuario_logado;
    header('Location: ../view/listar_pergunta_sugerida.php');
}


?>