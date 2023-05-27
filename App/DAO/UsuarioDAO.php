<?php
namespace App\DAO;

use App\Model\UsuarioModel;
use \PDO;

class UsuarioDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function selectUsuarioByEmailAndSenha(UsuarioModel $model) 
    {
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->email);
        $stmt->bindValue(2, sha1($model->senha));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
