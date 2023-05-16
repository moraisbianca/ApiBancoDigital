<?php

namespace App\DAO;
use PDO;
use App\Model\CorrentistaModel;

class CorrentistaDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();       
    }

    public function insert(CorrentistaModel $model)
    {
        $sql = "INSERT INTO correntista (nome, cpf, data_nasc, senha) VALUES (?, ?, ?, sha1(?) )";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->senha);
        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }
    
    public function update(CorrentistaModel $model)
    {
        $sql = "UPDATE correntista SET nome=?, cpf=?, data_nasc=?, senha=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->id);

        return $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM correntista ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById($id)
    {
        $sql = "SELECT * FROM correntista c WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getCorrentistaByCpfAndSenha($cpf, $senha)
    {
        $sql = "SELECT * FROM correntista c WHERE cpf = ? AND senha = sha1(?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);

        $stmt->execute();

        return $stmt->fetchObject();
    }


    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM correntista WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}