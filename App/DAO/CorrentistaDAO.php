<?php

namespace App\DAO;

use App\Model\CorrentistaModel;

class CorrentistaDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();       
    }

    public function select()
    {
        $sql = "SELECT * FROM correntista ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(CorrentistaModel $model) : bool
    {
        $sql = "INSERT INTO correntista (nome, cpf, data_nasc, senha) VALUES (?, ?, ?, sha1(?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->senha);

        return $stmt->execute();
    }

    public function autenticar(CorrentistaModel $model)
    {
        $sql = "SELECT id, nome FROM usuario WHERE usuario = ? AND senha = ? ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $usuario_digitado);
            $stmt->bindValue(2, sha1($senha_digitada));
            $stmt->execute();

            $dados_usuario = $stmt->fetchObject();
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


    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM correntista WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}