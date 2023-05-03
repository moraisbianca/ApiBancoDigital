<?php

use App\Controller\
{
    ChaveController,
    ContaController,
    CorrentistaController,
    TransacaoController
};

if(!isset($_SESSION['dados_usuario'])) {
    header("location: login.php");
}

if(isset($_GET['sair']))
{
    session_destroy();
    header("location: login.php");
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/correntista/save':
        CorrentistaController::save();
    break;

    case '/correntista/entrar':
        CorrentistaController::auth();
    break;

    case 'conta/extrato':
        ContaController::extrato();
    break;
    
    case 'conta/pix/enviar':
        ContaController::enviarpix();
    break;
    
    case 'conta/pix/receber':
        ContaController::receberpix();
    break;

    default:
        echo("oi");
        //http_response_code(403);
    break;


}
