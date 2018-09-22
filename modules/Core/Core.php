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

	// roda o config
	public function run($config) {
		$this->config = $config;
		// carrega módulo e manda para o método load em Router
		$this->loadModule('router')->load()->match();
	}

	// obtém o nome do banco
	public function getConfig($name) {
		return $this->config[$name];
	}

	// prepara o carregamento para a index
	public function loadModule($moduleName) {

		try {
			// quando recebe o nome do módulo, passa para minúsculo, e a primeira letra em maiúsculo
			$moduleName = ucfirst(strtolower($moduleName));

			// carrega a instância do module
			$module = $moduleName::getInstance();
			return $module;
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
}
?>