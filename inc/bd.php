<?php
class Conexao {
	var $host = "localhost";
	var $usuario = "root";
	var $senha = "";
	var $banco = "420d";

	public $mysqli;
	
	public function abrir()	{
	$this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
	}

	public function fechar() {
		$this->mysqli->close();
	}
}

class Comando {
	public function executar($sql) {
		$con = new Conexao();
		$con->abrir();
		$re = $con->mysqli->query($sql);
		$con->fechar();
		return $re;
	}
}
?>
