<?php

class admin {


    public $adm_id;
    public $adm_nome;	
    public $adm_email;	
    public $usuario;
    public $senha;

    
    public function __construct($adm_id = false)
    {
        $this->adm_id = $adm_id;
        if($adm_id){
            $this->adm_id = $adm_id;
            $this->admin_carregar();
        }
    }


    public function admin_listar ()
    {
        $sql = "SELECT * FROM tb_adm";
        include "../conexao.php";
        $resultadoadm = $conexao->query($sql);
        $lista_adm = $resultadoadm->fetchAll();
        return $lista_adm;
    }


    public function admin_carregar ()
    {
        $sql = "SELECT * FROM tb_adm WHERE adm_id=".$this->adm_id;
        include "../conexao.php";
        $resultado_adm = $conexao->query($sql);
        $linha_adm = $resultado_adm->Fetch();
        $this->adm_nome= $linha_adm['adm_nome'];
        

    }

    public function admin_mudar_senha()
    {
        $sql = "UPDATE tb_adm SET 
        senha = '". $this->senha. "'
        WHERE adm_id = ".$this->adm_id;
        include "../conexao.php";
        $conexao-> exec($sql);

    }

    public function admin_mudar_login()
    {

    }

}


?>
