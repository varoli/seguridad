<?php
	class ManejadorMySql{
		private $host= "localhost";
		private $user= "root";
		private $pass= "";
		private $bd= "seguridad";
		private $port= "3306";
		private $mysqli;
		
		public function __construct(){
			$this->mysqli= new mysqli($this->host, $this->user, $this->pass, $this->bd, $this->port);
			if(mysqli_connect_errno()){
				echo "Falló la conexión: ". mysqli_connect_error();
			}
		}
		
		public function realizarConsulta($sql){
			$this->mysqli->set_charset("utf8");
			return $this->mysqli->query($sql);
		}
		
		public function getMysql(){
			return $this->mysqli;
		}
		
		public function __destruct(){
			$this->mysqli->close();
		}
	}	
?>