<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Saexy - Riot Games API</title>

        <link rel="icon" type="image/png" href="./assets/lol.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12 background-box">
                    <div class="col-md-12">&nbsp;</div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="./assets/lol.png" class="m-3" alt="Logo League of Legends" width="100">
                        <img src="./assets/riot-games.png" class="m-3" alt="Logo League of Legends" width="100">
                    </div>
                    <h3 class="text-white text-center">Procurar dados de partida por ID</h3>
                    <h5 class="text-white text-center">Caso não saiba pegar a key da Riot Games, <a target="_blank" href="https://developer.riotgames.com/">clique neste link</a></h5>
                    <div class="col-md-12">&nbsp;</div>

                    <form id="frmpesquisa" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                        <div class="d-flex justify-content-center align-items-center m-3">
                            <label for="idkey" class="text-white text-center">Chave Riot: </label>
                            <input type="text" name="key" class="col-md-3 form-control" id="idkey" required>
                        </div>
                        <div class="d-flex justify-content-center align-items-center m-3">
                            <label for="idnickname" class="text-white text-center">Apelido no jogo: </label>
                            <input type="text" name="nickname" class="col-md-3 form-control" id="idnickname" required>
                        </div>
                        <div class="d-flex justify-content-center align-items-center m-3">
                            <input type="submit" class="btn btn-lg btn-info botao" name="pesquisar" value="Pesquisar...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <?php
    
    if(isset($_POST['pesquisar'])){

        $key = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_SPECIAL_CHARS);
        $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_SPECIAL_CHARS);
        
        header("Location: dashboard.php?key=$key&nickname=$nickname");
    }
    
    ?>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</html>