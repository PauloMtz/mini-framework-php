<?php

/*
* classe que define as rotas
*/

class Router {

	private $core;
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
		$this->core = Core::getInstance();
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

	// pega o método de requisição, a url e o tipo de padrão
	public function match() {

		// pega a url conforme arquivo htaccess
		$url = ((isset($_GET['url'])) ? $_GET['url'] : '');
		//echo "URL: ".$url;
		//echo "Método: ".$_SERVER['REQUEST_METHOD'];

		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
			default:
				$type = $this->get;
				break;
			
			case 'POST':
				$type = $this->post;
				break;
		}

		// loop em todos as rotas
		foreach ($type as $patt => $func) {

			// identifica argumentos e os subtitui por regex
			$pattern = preg_replace('(\{[a-z0-9]{0,}\})', '([a-z0-9]{0,})', $patt);
			//echo "Padrão: ".$pattern;
			//echo "<hr>";

			// executa o match da url
			if (preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {
				array_shift($matches);
				array_shift($matches);
				//print_r($matches);
				//break;

				// pega argumentos para associação
				$itens = array();
				if (preg_match_all('(\{[a-z0-9]{0,}\})', $patt, $mat)) {
					//print_r($mat);
					$itens = preg_replace('(\{|\})', '', $mat[0]);
					//print_r($itens);
				}

				// efetua a associação
				$arg = array();
				foreach ($matches as $key => $match) {
					$arg[$itens[$key]] = $match;
				}

				//print_r($arg);
				$func($arg);
				break;
			}
		}
	}

	public function get($pattern, $function) {
		$this->get[$pattern] = $function;
	}

	public function post() {
		$this->post[$pattern] = $function;
	}
}
?>