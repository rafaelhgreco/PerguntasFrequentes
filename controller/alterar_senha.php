<?php
require_once "../class/admin.php";
$senha_nova = new admin();
$senha_nova -> adm_id = $_POST['seladm'];
$senha_nova-> senha = $_POST['newPassword'];
$senha_nova ->admin_mudar_senha();
header('Location:../view/config_conta.php')

?>
