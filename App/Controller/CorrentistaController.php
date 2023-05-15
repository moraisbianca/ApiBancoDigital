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
        $json_obj = parent::getJSONFromRequest();

		$model = new CorrentistaModel();
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
