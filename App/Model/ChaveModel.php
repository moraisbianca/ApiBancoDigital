<?php
namespace App\Model;

use App\DAO\ChaveDAO;

class ChaveModel extends Model {
	public $id, $tipo, $chave, $id_conta;

	public function save() 
	{
		$dao = new ChaveDAO();
		if($this->id == null)
			$dao->insert($this);
		else
			$dao->update($this);
	}

	public function getAllRows() 
	{
		$dao = new ChaveDAO();

		$this->rows = $dao->select();
	}

	public function delete(int $id) 
	{
		$dao = new ChaveDAO();
		
		$dao->delete($id);
	}

	public function getById(int $id) 
	{
		$dao = new ChaveDAO();

		$this->rows = $dao->selectById($id);
	}
}