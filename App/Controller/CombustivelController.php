<?php
namespace App\Controller;

class CombustivelController extends Controller {
	
	public static function form() 
	{
		parent::isAuthenticated();
		parent::render("combustivel/cr_combustivel");
	}
}
