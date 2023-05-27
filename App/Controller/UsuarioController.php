<?php
namespace App\Controller;

use App\Model\UsuarioModel;

class UsuarioController extends Controller {

	public static function form() 
	{
		parent::render("usuario/form_login");
	}

	public static function autenticar()
	{
		$model = new UsuarioModel();

		$model->email = $_POST['email'];
		$model->senha = $_POST['senha'];
		$model->remember = $_POST['remember'];
		parent::setResponseAsJSON($model->autenticar());
	}
}
