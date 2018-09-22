<?php
$this->get('noticias', function($arg) {
	echo 'Últimas Notícias';
});
$this->get('noticias/{id}', function($arg) {

	// carrega o módulo Template
	$templ = $this->core->loadModule('template');

	// envia dados para o view
	$num = array('numero' => $arg['id']);

	// carrega o template teste.php, localizado na pasta templates
	// a pasta templates é utilizada para os arquivos de visualização do usuário
	$templ->render('teste', $num);
});
?>