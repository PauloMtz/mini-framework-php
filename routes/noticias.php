<?php

/*
* arquivo de rotas para notícias
* essa primeira rota carrega a página inicial
* pode-se criar outras rotas para acessar outras páginas
*/

$this->get('noticias', function($arg) {
	
	// carrega o módulo Template
	$templ = $this->core->loadModule('template');

	// carrega o módulo de notícias
	$news = $this->core->loadModule('noticias');

	$dados = array();

	// o método getNoticias obtém $sql do módulo de notícias
	// $dados carrega noticias para enviar para noticias-lista.php
	$dados['noticias'] = $news->getNoticias();

	// carrega o template noticias-lista.php, localizado na pasta templates, e envia $dados
	// a pasta templates é utilizada para os arquivos de visualização do usuário
	$templ->render('noticias-lista', $dados);
});

// essa rota carrega outra página (detalhes da notícia)
$this->get('noticias/{id}', function($arg) {

	$templ = $this->core->loadModule('template');
	$news = $this->core->loadModule('noticias');

	$dados = array();
	$dados['info'] = $news->getInfo($arg['id']);

	$templ->render('noticia-detalhe', $dados);
});

// rota post (para envio de formulário)
$this->post('noticias/', function($arg) {
	// code...
});
?>