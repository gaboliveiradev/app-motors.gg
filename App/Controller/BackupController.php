<?php
namespace App\Controller;

use Exception;

class BackupController extends Controller {

	public static function export() 
	{
		setlocale(LC_TIME, 'pt_BR.utf8');
		$path = "C:\backup-motors.gg";

		try {
			if(!is_dir($path)) {
				mkdir($path);
				self::criarArquivoBat();
			} else {
				self::criarArquivoBat();
			}

			parent::setResponseAsJSON(true);
		} catch (Exception $err){
			parent::setResponseAsJSON(false);
		}
	}

	public static function import() 
	{
        exec(BASEDIR . '/App/Backup/import.bat');  
	}

	private static function criarArquivoBat() {
		$dataHoraAtual = date("d-m-Y-H-i-s");
		$nomeArquivo = "backup_" . $dataHoraAtual . ".sql";

		$caminhoArquivo = "C:\\backup-motors.gg\\" . $nomeArquivo;
		$comando = 'C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\mysqldump -hlocalhost -P3307 -uroot -petecjau ggmotors_banco --databases > "' . $caminhoArquivo . '"';
		exec($comando);
	}

}
