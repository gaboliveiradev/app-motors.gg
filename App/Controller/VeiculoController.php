<?php
namespace App\Controller;

class VeiculoController extends Controller {

	public static function form() 
	{
		parent::isAuthenticated();
		parent::render('veiculo/form_cad_veiculo');	}
}
