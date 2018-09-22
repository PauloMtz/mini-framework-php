<?php
$this->get('noticias', function($arg) {
	echo 'Últimas Notícias';
});
$this->get('noticias/{id}', function($arg) {
	$templ = $this->core->loadModule('template');

	$num = array('numero' => $arg['id']);

	$templ->render('teste', $num);
});
?>