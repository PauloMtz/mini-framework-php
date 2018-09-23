<?php
$this->get('noticias', function($arg) {
	echo 'Últimas Notícias';
});
$this->get('noticias/{id}', function($arg) {

	// carrega o módulo Template
	$templ = $this->core->loadModule('template');

	// carrega o módulo Database
	$db = $this->core->loadModule('database');

	// testando consulta no banco
	$sql = $db->query("SELECT nome, email FROM usuarios");
	$array = $sql->fetchAll();
	print_r($array);

	// carrega o template teste.php, localizado na pasta templates
	// a pasta templates é utilizada para os arquivos de visualização do usuário
	$templ->render('teste');
});
?>