
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
        <?php

        //INCLUINDO O ARQUIVO RiotAPI.php NESTE ARQUIVO
        include_once './entities/RiotAPI.php';
        //INCLUINDO O ARQUIVO Account.php NESTE ARQUIVO
        include_once './entities/Account.php';

        $key = $_GET['key'];
        $nickname = $_GET['nickname'];

        //VERIFICANDO SE AS VARIAVEIS KEY E NICKNAME ESTÃO SETADAS
        if(!isset($key) || !isset($nickname)){
            header("Refresh:0; Url=index.php");
            exit;
        }

        //INSTANCIANDO O OBJETO RiotAPI
        $riotapi = new RiotAPI($key);

        //VERIFICANDO SE A CONTA PROCURADA EXISTE NA API
        if(!$riotapi->existsAccount($nickname)){
            echo '<script>alert("Esta conta não existe nos sistemas da Riot Games/League of Legends.");</script>';
            header("Refresh:0; Url=index.php");
            exit;
        }

        $raccount = $riotapi->getAccount($nickname);
        $rrankedaccount = null;

        //VERIFICANDO SE O JOGADOR JÁ JOGOU RANQUEADAS
        if($riotapi->existsRankedAccount($nickname)){
            $rrankedaccount = $riotapi->getRankedAccount($nickname);
        }

        //INSTANCIANDO O OBJETO Account
        $account = new Account($raccount, $rrankedaccount);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12 background-box">
                    <div class="col-md-12">&nbsp;</div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?php echo $account->getIconUrl(); ?>" class="m-3" alt="Ícone invocador" width="100">
                        <div class="align-middle">
                            <p class="text-white" style="font-size: 32px;"><?php echo $account->getName(); ?></p>
                            <p class="text-white" style="font-size: 24px;">Level: <?php echo $account->getLevel(); ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-5">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="textos mr-3">
                                    <p class="text-white" style="font-size: 24px;">Elo Solo Queue</p>
                                    <p class="text-white" style="font-size: 15px;"><?php echo $account->getTier()." ".$account->getRank(); ?></p>
                                </div>
                                <div class="imagem">
                                    <img src="<?php echo $account->getTierImage(); ?>" alt="Ícone invocador" width="100">
                                </div>
                            </div>
                            <div class="textos">
                                <div class="text-center">
                                    <span class="text-white" style="font-size: 15px;">Vitórias: <?php echo $account->getWins(); ?></span>
                                </div>
                                <div class="text-center">
                                    <span class="text-white" style="font-size: 15px;">Derrotas: <?php echo $account->getLosses(); ?></span>
                                </div>
                                <div class="text-center">
                                    <span class="text-white" style="font-size: 15px;">Taxa de Vitória: <?php echo $account->getWinRate(); ?>%</span>
                                </div>
                                <div class="text-center">
                                    <span class="text-white" style="font-size: 15px;">Pontos de Liga: <?php echo $account->getPoints(); ?></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center justify-content-center mt-3 mb-3">
                        <a href="index.php" class="btn btn-lg btn-info botao">Voltar a página inicial...</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</html>