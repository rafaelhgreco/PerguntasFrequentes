<?php
require_once '../class/pergunta.php';
require_once '../class/admin.php';

$nome_admin = new admin();
$lista_adm = $nome_admin->admin_listar();

$id_pergunta = $_GET['id_pergunta'];
$nova_pergunta = new pergunta($id_pergunta);

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="../css/areaadmin.css" rel="stylesheet">
    <title>Dashbord Admin</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" >
            <img class="logo" src="../img/FATEC.svg" >
            <div class="container ">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse  " id="navbarNav">
                <ul class="navbar-nav">
                      <li class="nav-item mx-3 ">

                          <h2 class="nav-link text-light text-dark">Painel Administrativo</h2>

                      </li>
                      <li class="nav-item mx-3" >
                          <a class="nav-link text-dark" href="listar_pergunta_sugerida.php" >Perguntas sugeridas</a>
                      </li>
                      <li class="nav-item mx-3">
                          <a class="nav-link text-dark" href="form_nova_pergunta.php" >Publicar pergunta</a>
                      </li>
                      <li class="nav-item mx-3">
                          <a class="nav-link text-dark" href="listar_pergunta_publicada.php" >Perguntas publicadas</a>
                      </li>
                      <li class="nav-item mx-3">
                          <a class="nav-link text-dark" href="listar_pergunta_anulada.php" >Perguntas anuladas</a>
                      </li class="nav-item mx-3">
                          <a class="nav-link text-dark" href="config_conta.php" >Configurações de conta</a>
                      </li>
                      <li class="nav-item mx-3">
                          <a class="nav-link text-dark" href="../index.php" > ⬅ Voltar </a>
                      </li>
                  </ul>
              </div>
            </div>
        </nav>

    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <br><br><br>
    <main>

        <div class="container mt-4">
            <br>
            <form action="../controller/postar_pergunta.php" method="POST">
                <h4 style="text-align: center;">Publicar uma nova pergunta</h4><br><br>
                <div class="mb-3">
                    <input type="hidden" name="id_pergunta" value="<?=$nova_pergunta->id_pergunta?>">
                    <label for="titulo" class="form-label" >Pergunta Sugerida:  </label>
                    <input type="text" name="titulo" value="<?=$nova_pergunta->pergunta ?>">
                </div>
                <div class="mb-3">
                <label for="seladm">Selecionar admin: </label>
                <select name="seladm">
                    <option value=''>Selecione... </option>
                    <?php
                        foreach($lista_adm as $linha):
                            echo "<option value='{$linha['adm_id_resposta']}'>
                            {$linha['adm_nome']}
                            </option>";
                        endforeach
                    ?>
                </select>
                <br><br>
                <label for="selstatus">Definir status: </label>
                <select name="selstatus">
                    <option value='RES'>Respondido</option>
                </select>
                </div>
                <div class="mb-3">
                    <label for="resposta" class="form-label">Resposta da Pergunta</label>
                    <textarea class="form-control" id="resposta" name="resposta" rows="4" placeholder="Digite a resposta da pergunta"></textarea>
                </div>
                <div class="d-grid gap-2 d-flex text-center">
                    <button type="submit" class="btn btn-primary ">Adicionar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>

                </div>
            </form>
            <br><br>
        </div>
    </main>

</body>
</html>
