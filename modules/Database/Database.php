<?php

/*
* classe que se conecta ao banco de dados
*/

class Database {

	/*
	* a conexão deve ser no construtor, deve puxar os dados do arquivo config.php
	* que por sua vez, devem ser puxados através do Core
	*/

	private $pdo_connect;

	private function __construct() {

		// instancia o Core para chamar o método getConfig
		$core = Core::getInstance();

		// chama o db_connect lá do arquivo config.php
		$db = $core->getConfig('db_connect');

		// tenta se conectar ao banco
		try {
			$this->pdo_connect = new PDO("mysql:dbname=".$db['db_name'].";host=".$db['host'], $db['user'], $db['pass']);

			// configurações para os casos de erros
			$this->pdo_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo_connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	// padrão singleton para chamar a conexão apenas uma vez
	public static function getInstance() {

		static $instance = null;

		if ($instance == null) {
			$instance = new Database();
		}

		return $instance;
	}

	// executa queries
	public function query($sql) {
		return $this->pdo_connect->query($sql);
	}

	// executa prepares
	public function prepare($sql) {
		return $this->pdo_connect->prepare($sql);
	}

	// NÃO PRECISA - será usado no $sql no model
	/*
	public function execute($array) {
		return $this->pdo_connect->execute($array);
	}
	*/
}
?>