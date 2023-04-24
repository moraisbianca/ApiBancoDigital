<?php

namespace App\Model;

use App\DAO\CorrentistaDAO;

class CorrentistaModel extends Model
{
    public $id, $nome, $cpf, $data_nasc, $senha;
    
    public function save()
    {
        if($this->id == null)
            (new CorrentistaDAO())->insert($this);
        else
            (new CorrentistaDAO())->update($this);
    }

    /**
     * 
     */
    public function getAllRows()
    {
        $this->rows = (new CorrentistaDAO())->select();
    }

    /**
     * 
     */
    public function delete()
    {
        (new CorrentistaDAO())->delete($this->id);
    }
}