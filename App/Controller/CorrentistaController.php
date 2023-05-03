<?php

namespace App\Controller;

use App\Model\CorrentistaModel;
use App\DAO;
use Exception;

class CorrentistaController extends Controller
{


    public static function save(): void
    {
        try {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();
            $model->id = $json_obj->id;
            $model->nome = $json_obj->nome;
            $model->cpf = $json_obj->cpf;
            $model->data_nasc = $json_obj->data_nasc;
            $model->senha = $json_obj->senha;

            $model->save();
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }

    public static function auth()
    {
        try {

            session_start();

            $usuario_digitado = $_REQUEST['usuario'];
            $senha_digitada = $_REQUEST['senha'];

            


            // Comparando o certo com o digitado.
            if ($dados_usuario) {

                $_SESSION['dados_usuario'] = $dados_usuario;
                header("Location: index.php");
            } else {

                header("Location: login.php?erro=true");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function select()
    {
    }

    public static function update()
    {
    }

    public static function delete()
    {
    }
}
