<?php

use App\Controller\
{
    ChaveController,
    ContaController,
    CorrentistaController,
    TransacaoController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case 'correntista/index':

    break;

    case 'correntista/form':

    break;

    case 'correntista/save':

    break;
    
    case 'correntista/entrar':

    break;

    case 'correntista/delete':

    break;
    

    case 'conta/index':

    break;

    case 'conta/form':

    break;

    case 'conta/save':

    break;

    case 'conta/delete':

    break;

    case 'conta/extrato':

    break;
    
    case 'conta/pix/enviar':
    
    break;
    
    case 'conta/pix/receber':
    
    break;

    //



    default:
        echo("oi");
        //http_response_code(403);
    break;


}
