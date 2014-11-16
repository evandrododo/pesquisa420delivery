<?php
class Conexao {
	var $host = "localhost";
	var $usuario = "root";
	var $senha = "";
	var $banco = "420d";

	public $mysqli;
	
	public function Abrir()	{
	$this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
	}

	public function Fechar() {
		$this->mysqli->close();
	}
}
class Comando {
	public function Executar($sql) {
		$con = new Conexao();
		$con->Abrir(); 
		$re = $con->mysqli->query($sql);
		$con->Fechar();
		return $re;
	}
}
?>
