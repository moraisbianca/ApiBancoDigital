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
            $model->id = $json_obj->Id;
            $model->nome = $json_obj->Nome;
            $model->cpf = $json_obj->Cpf;
            $model->data_nasc = $json_obj->DataNasc;
            $model->senha = $json_obj->Senha;

            parent::getResponseAsJSON($model->save());

        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }

    public static function auth()
    {
        $json_obj = parent::getJSONFromRequest();

        //var_dump($json_obj);

		$model = new CorrentistaModel();

        parent::getResponseAsJSON($model->auth($json_obj->Cpf, $json_obj->Senha));
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
