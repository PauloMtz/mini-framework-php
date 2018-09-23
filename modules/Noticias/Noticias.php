<?php

/*
* classe para executar a regra de negócio das notícias
* essa classe representa o model
*/

class Noticias {

	// deve se conectar ao banco de dados
	private $db;

	// para isso, deve chamar o core no construtor
	private function __construct() {
		$core = Core::getInstance();
		$this->db = $core->loadModule('database');
	}

	public static function getInstance() {

		static $instance = null;

		if ($instance == null) {
			$instance = new Noticias();
		}

		return $instance;
	}

	// pega a lista de notícias no banco - apenas o título
	// será utilizado na página inicial
	public function getNoticias() {
		
		$dados = array();

		$sql = $this->db->query("SELECT id, titulo FROM noticias");
		if($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();
		}

		return $dados;
	}

	// pega as notícias para serem exibidos na página de detalhe da notícia
	public function getInfo($id) {

		$dados = array();

		$sql = $this->db->prepare("SELECT * FROM noticias WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dados = $sql->fetch();
		}

		return $dados;
	}
}
?>