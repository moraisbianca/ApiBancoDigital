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
    /**
     * Método: POST
     * Exemplo: http://10.0.2.2/correntista/save
     */
    case '/correntista/save':
        CorrentistaController::save();
    break;

    /**
     * Método GET
     * Exemplo de Acesso: http://10.0.2.2/correntista
     */
    case '/correntista':
        CorrentistaController::list();
    break;

    /**
     * Método GET
     * Exemplo de Acesso: http://10.0.2.2/correntista/delete?id=1
     */
    case '/correntista/delete':
        CorrentistaController::delete();
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
