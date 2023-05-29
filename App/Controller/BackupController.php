<?php
namespace App\Controller;

use Exception;

class BackupController extends Controller {

	public static function export() 
	{
		$path = "C:\backup-motors.gg";

		try {
			if(!is_dir($path)) {
				mkdir($path);
				exec(BASEDIR . "/App/Backup/export.bat");
			} else {
				exec(BASEDIR . "/App/Backup/export.bat");
			}

			parent::setResponseAsJSON(true);
		} catch (Exception $err){
			parent::setResponseAsJSON(false);
		}
	}

	public static function import() 
	{
		$path = "C:\backup-motors.gg";

		try {
			if(!is_dir($path)) {
				mkdir($path);
				exec(BASEDIR . "/App/Backup/import.bat");
			} else {
				exec(BASEDIR . "/App/Backup/import.bat");
			}

			parent::setResponseAsJSON(true);
		} catch (Exception $err) {
			parent::setResponseAsJSON(false);
		}
	}
}
