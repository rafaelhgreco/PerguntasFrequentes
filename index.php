<?php 

    require_once "class/pergunta.php";
    require_once "conexao.php";
    $pergunta = new pergunta();
    $lista  = $pergunta->listar_pergunta_index();


    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM tb_perguntas WHERE (id_pergunta LIKE '%$data%'  or pergunta LIKE '%$data%' or resposta LIKE '%$data%') and status_pergunta = 'RES' ORDER BY id_pergunta DESC";
    }
    else
    {
        $sql ="SELECT * FROM tb_perguntas WHERE status_pergunta = 'RES' ORDER BY pergunta DESC ";
    }
    $result = $conexao->query($sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/paginaindex.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Poppins:ital,wght@0,400;0,500;1,500&display=swap" rel="stylesheet">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Duvidas Frequentes</title>
</head>
<body style="background-color:#F9F9F9; font-family: Tahoma;"> 

    <header>
      
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#F3F3F3; box-shadow:2px 1px 1.5px #FF9393;">
            <img class="" src="img/FATEC.svg" style="margin-left: 33px">
            <div class="container ">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-3">
                            <h2 class="navbar-brand text-dark" style="font-size: 20px;margin-right: 125px;">Central de Ajuda</h2> 
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-light text-dark" href="index.php" style="font-size: 17px;">Início</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link text-light text-dark" href="enviar_pergunta.html" style="font-size: 17px;">Enviar uma pergunta</a>
                        </li>
                        <li class="nav-item mx-3 ">
                            <button id="botaoadm"><a class="nav-link" href="login.html" style="font-size: 17px;"><label id="admarea">Área administrativa</label></a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </header>

    <main>
        <br><br><br><br><br><br>
        
        <div class="container" >
          <div id="ajuda" style="background-color:#f5f5f5;">
            <br>
            <h2  id="fonte" class="d-flex justify-content-center align-items-center " style="font-family: Comic Sans, cursive;font-weight: semi-bold;" >Precisa de Ajuda?</h2>
            <br>
            <h4 class="d-flex justify-content-center align-items-center" style="font-family: Comic Sans, cursive;font-weight: semi-bold;">Explore os tópicos de dúvidas ou entre em contato conosco!</h4>
            <div class="d-flex justify-content-center align-items-center pt-4">
                
                <a class="link" target="_blank" href="https://www.instagram.com/fatecdeitapira/"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="41" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg></a>
                <label>Instagram</label>
                
                <a class="link" target="_blank" href="https://api.whatsapp.com/send?phone=551938635210&text="><svg xmlns="http://www.w3.org/2000/svg" width="100" height="41" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                </svg></a>
                <label>Secretaria</label>
                
                
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="41" fill="currentColor" style="color: #A93146;"viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                </svg>
                <label>(19) 3843-1996</label>
            </div>
            
            
          </div>
          <br><br>
          <div class="box-search" style="display:flex; padding:5px;"> 
                <input type="search" class="form-control w=25" id="pesquisar" placeholder="Pesquisar....">
                <button class="btn" onclick="searchData()" style="margin-left:5px;"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>

            </div>
           <br><br> 
           <div class="accordion-item">
                <?php
                    while ($user_data = $result->fetch(PDO::FETCH_ASSOC)):
                 ?>
                
                <h2  class="accordion-header" style="color:white;background-color:#3F3F3F; border-radius:1px;padding:20px; box-shadow:1px 1px 1px #252525;" id="heading<?php echo $user_data['id_pergunta']; ?>">
                    
                    <button id="perguntas<?php echo $user_data['id_pergunta']; ?>" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $user_data['id_pergunta']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $user_data['id_pergunta']; ?>">
                        <label><?php echo $user_data['pergunta']; ?></label>
                        
                    </button>
                    
                </h2>
                <span> + </span>
                <div style="color:#252525; background-color:#f1f1f1; border-radius:11px;padding:20px; box-shadow:1px 1px 1px #252525;" id="collapse<?php echo $user_data['id_pergunta']; ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $user_data['id_pergunta']; ?>" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        
                        <label><?php echo $user_data['resposta']; ?></label>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <br><br><br><br>
       
    </main>
    
    <footer class="footer "style="margin-top: 25vh;background-color#f3f3f3;  box-shadow:10px 1px 3px black;">
      <div class="container text-center text-dark">
            <br>
            <label>&copy; 2023 Duvidas Gerais Fatec Itapira - Dr. Ogari de Castro Pacheco. Todos os direitos reservados.</label>
            <br>
            <label>Endereço: R. Tereza Lera Paoletti, 590 - Bela Vista, Itapira - SP, 13974-080</label>
            <br><br>
      </div>
    </footer>
    <script src="scripts/script_index.js"> </script>
</body>
</html>