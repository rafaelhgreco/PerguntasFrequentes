<?php 

require_once "../class/pergunta.php";
require_once "../conexao.php";
$pergunta_anulada = new pergunta();
$lista = $pergunta_anulada->listar_pergunta_anulada();


if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql = "SELECT * FROM tb_perguntas_excluidas WHERE (id_pergunta LIKE '%$data%'  or pergunta LIKE '%$data%' or resposta LIKE '%$data%' or nome_solicitante LIKE '%$data%' or email_solicitante LIKE '%$data%') ORDER BY id_pergunta DESC";
}
else
{
    $sql ="SELECT * FROM tb_perguntas_excluidas ORDER BY id_pergunta DESC ";
}
$result = $conexao->query($sql);



?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&display=swap" rel="stylesheet">
    <link href="../css/areaadmin.css" rel="stylesheet">
</head>

<body> 
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <img class="logo" src="../img/FATEC.svg" >
            <div class="container ">
                    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h2 class="nav-link text-light text-dark">Painel Administrativo</h2>
                <div class="box-search"> 
                    <input type="search" class="form-control w=25" id="pesquisar" placeholder="Pesquisar....">
                    <button class="btn" onclick="searchData()" style="margin-left:5px;"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div> 
                <div class="collapse navbar-collapse  " id="navbarNav">
                <ul class="navbar-nav">
                        <li class="nav-item mx-3" >
                            <a class="nav-link text-dark" href="listar_pergunta_sugerida.php">Perguntas sugeridas</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-dark" href="form_nova_pergunta.php">Publicar pergunta</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-dark" href="listar_pergunta_publicada.php">Perguntas publicadas</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-dark" href="listar_pergunta_anulada.php">Perguntas anuladas</a>
                        </li class="nav-item mx-3">
                            <a class="nav-link text-dark" href="config_conta.php">Configurações de conta</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-dark" href="../index.php"> ⬅ Voltar </a>
                        </li>
                    </ul>
                    </div>
                </div>    
            </nav>
            
    </header>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <br><br><br><br><br><br>

    <main>
    <div class="container">
            <div class="table-container">
                <table class="table table-striped bg-light">
                    
                    <thead>
                        <br>
                        <h4>Perguntas Anuladas</h4>
                        <br><br>
                        <tr>
                            <th>Ordem</th>
                            <th>Perguntas</th>
                            <th>Nome Solicitante</th>
                            <th>E-mail Solicitante</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php 
                        while($user_data = $result-> fetch(PDO::FETCH_ASSOC))
                        {   
                            echo"<tr>:";
                            echo"<td>".$user_data['id_pergunta']."</td>";
                            echo"<td>".$user_data['pergunta']."</td>";
                            echo"<td>".$user_data['nome_solicitante']."</td>";
                            echo"<td>".$user_data['email_solicitante']."</td>";
                            echo"<td>".$user_data['status_pergunta']."</td>";

                            echo "<td>
                                        <a class='btn btn-sm btn-danger' href='../controller/deletar-pergunta.php?id_pergunta=$user_data[id_pergunta]'><img class='botao' src='../img/trash.svg'></a>
                                    </td>";
                        }
                       
                    ?>
                        </tbody>
                </table>     
            </div>
        </div>
    </main>
    <script src="../scripts/script_anulada.js"> </script>
        
    
    

    
</body>
</html>