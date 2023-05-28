<?php
namespace App\Controller;

class TipoVeiculoController extends Controller {

	public static function form() 
	{
		parent::isAuthenticated();
		parent::render("tipo veiculo/cr_tipo_veiculo");
	}
}
