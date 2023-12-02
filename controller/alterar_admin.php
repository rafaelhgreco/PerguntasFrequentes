<?php
require_once "../class/admin.php";
$senha_nova = new admin();
$senha_nova -> adm_id = $_POST['seladm_Login'];
$senha_nova-> usuario = $_POST['newLogin'];
$senha_nova-> senha = $_POST['newPassword'];
$senha_nova ->admin_mudar();
header('Location:../view/config_conta.php')

?>
