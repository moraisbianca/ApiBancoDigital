<?php

namespace App\DAO;

use App\Model\ChaveModel;
use \PDO;

class ChaveDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(ChaveModel $model)
    {
        $sql = "INSERT INTO chave_pix(tipo, chave, id_conta) VALUES (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo);
        $stmt->bindValue(2, $model->chave);
        $stmt->bindValue(3, $model->id_conta);
        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(ChaveModel $model)
    {
        $sql = "UPDATE chave_pix SET tipo = ?, chave = ?, id_conta = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo);
        $stmt->bindValue(2, $model->chave);
        $stmt->bindValue(3, $model->id_conta);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function select()
    {
        $sql = "SELECT cp.*,
                co.nome as nome_conta
        FROM chave_pix cp 
        JOIN conta c ON c.id = cp.id_conta
        JOIN correntista co ON co.id = c.id_correntista

        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id)
    {
        $sql = "SELECT cp.*,
                co.nome as nome_conta
        FROM chave_pix cp 
        JOIN conta c ON c.id = cp.id_conta
        JOIN correntista co ON co.id = c.id_correntista
        WHERE cp.id = ?
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM chave_pix WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}