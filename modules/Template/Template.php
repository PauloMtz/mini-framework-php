<?php

/*
* classe que carrega os templates
*/

class Template {
	private function __construct() {}

	public static function getInstance() {

		static $instance = null;

		if ($instance == null) {
			$instance = new Template();
		}

		return $instance;
	}

	// carrega o arquivo de visualização para o usuário
	public function render($templ_name, $dados = array()) {

		if (file_exists('templates/'.$templ_name.'.php')) {
			require 'templates/'.$templ_name.'.php';
		}
	}
}
?>