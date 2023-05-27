<?php
namespace App\Controller;

class UsuarioController extends Controller {

	public static function formLogin() 
	{
		parent::render("usuario/form_login");
	}
}
