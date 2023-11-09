<?php

namespace App\Controller;

use App\Model\ChaveModel;
use Exception;

class ChaveController extends Controller
{

    public static function save() : void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new ChaveModel();
            $model->id = $json_obj->Id;
            $model->chave = $json_obj->Chave;
            $model->tipo = $json_obj->Tipo;
            $model->id_conta = $json_obj->Id_conta;

            $model->save();
              
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }

    public static function select() : void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));


			$model = new ChaveModel();
			$model->id_conta = $json_obj->Id_conta;


			parent::getResponseAsJSON($model->GetChavePixByIdConta($json_obj->id));

        } catch (Exception $e) 
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function update()
    {

    }

    public static function delete()
    {
        try 
        {
            $model = new ChaveModel();
            
            $model->id = parent::getIntFromUrl(isset($_GET['id']) ? $_GET['id'] : null);

            $model->delete( (int) $_GET['id'] );


        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }
} 