<?php

/*
* classe que executa a dinâmica da estrutura MVC
* carrega o módulo apenas uma vez (padrão singleton)
*/

class Core {

	private $config;

	private function __construct() {}

	public static function getInstance() {

		static $instance = null;

		if ($instance == null) {
			$instance = new Core();
		}

		return $instance;
	}

	public function run($config) {
		$this->config = $config;
	}

	public function getConfig($name) {
		return $this->config[$name];
	}
}
?>