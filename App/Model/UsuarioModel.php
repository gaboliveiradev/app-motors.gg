<?php
namespace App\Model;

use App\DAO\UsuarioDAO;

class UsuarioModel extends Model {
	public $id, $nome, $email, $senha, $ativo, $remember;

	public function autenticar() 
	{
		$dao = new UsuarioDAO();
		$data_user = $dao->selectUsuarioByEmailAndSenha($this);

		if($data_user) {
            $_SESSION["motorsgg_logged"] = $data_user;
            if($this->remember == "on") self::remember($this->email);
			
			return $data_user;
        } else {
            return $data_user;
        }
	}

	private static function remember($value) {
        $validate = strtotime("+1 month");
        setcookie("motorsgg_login", $value, $validate, "/", "", false, true);
    }
}
