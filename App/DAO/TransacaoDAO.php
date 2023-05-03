<?php
namespace App\DAO;

use App\Model\TransacaoModel;
use \PDO;

class TransacaoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(TransacaoModel $model)
    {
        $sql = "INSERT INTO transacao(valor, data_hora, id_conta_enviou, id_conta_recebeu) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->valor);
        $stmt->bindValue(2, $model->data_hora);
        $stmt->bindValue(3, $model->id_conta_enviou);
        $stmt->bindValue(4, $model->id_conta_recebeu);
        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(TransacaoModel $model)
    {
        $sql = "UPDATE transacao SET valor = ?, data_hora = ?, id_conta_enviou = ?, id_conta_recebeu = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->valor);
        $stmt->bindValue(2, $model->data_hora);
        $stmt->bindValue(3, $model->id_conta_enviou);
        $stmt->bindValue(4, $model->id_conta_recebeu);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function select()
    {
        $sql = "SELECT t.*,
                        co1.nome as nome_enviou,
                        co2.nome as nome_recebeu              
                FROM transacao t             
                JOIN conta c1 ON c1.id = t.id_conta_enviou
                JOIN correntista co1 ON co1.id = c1.id_correntista
                JOIN conta c2 ON c2.id = t.id_conta_recebeu
                JOIN correntista co2 ON co2.id = c2.id_correntista
                ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById($id)
    {
        $sql = "SELECT t.*,
                        co1.nome as nome_enviou,
                        co2.nome as nome_recebeu              
                FROM transacao t             
                JOIN conta c1 ON c1.id = t.id_conta_enviou
                JOIN correntista co1 ON co1.id = c1.id_correntista
                JOIN conta c2 ON c2.id = t.id_conta_recebeu
                JOIN correntista co2 ON co2.id = c2.id_correntista
                WHERE t.id = ?
                ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM transacao WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();       
    }
}