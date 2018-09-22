<?php

/*
* classe que define as rotas
*/

class Router {

	private $get;
	private $post;

	private function __construct() {}

	public static function getInstance() {

		static $instance = null;

		if ($instance == null) {
			$instance = new Router();
		}

		return $instance;
	}

	// carrega a rota vinda do Core
	public function load() {
		// carrega o arquivo de rota padrão (default.php)
		$this->loadRouteFile('default');
		return $this;
	}

	// carrega o arquivo de rota
	public function loadRouteFile($file) {
		
		// verifica se existe arquivo de rota
		if (file_exists('routes/'.$file.'.php')) {
			require 'routes/'.$file.'.php';
		}
	}

	public function match() {
		//
	}

	public function get($pattern, $function) {
		$this->get[$pattern] = $function;
	}

	public function post() {
		$this->post[$pattern] = $function;
	}
}
?>