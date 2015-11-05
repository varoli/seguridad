<?php

	function escribirArchivo($archivo, $string, $tipo){
		$file= fopen($archivo, $tipo);
		fwrite($file, $string. PHP_EOL);
		fclose($file);
	}
	
	function getIp(){
		$variable= array("HTTP_CLIENT_IP", "HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED", "HTTP_FORWARDED_FOR", "HTTP_FORWARDED", "REMOTE_ADDR");
		foreach ($variable as $value) {
			if (getenv($value)) {
				return getenv($value);
			}
		}
		return false;
	}
	
	function guardarBitacora($string){
        date_default_timezone_set("America/Mexico_City");
		escribirArchivo("bitacora.log", "[". date("Y/m/d H:i:s"). "] ". $string. " ". getIp(), "a");
	}
	
	/*function registrarIpMaximoIntentos($user){
		$contentFile= "";
		$file = fopen("listaNegra.data","r");
		$contentFile= fread($file, filesize("listaNegra.data"));
		fclose($file);
		escribirArchivo("listaNegra.data", getIp(), "w");
	}*/
?>