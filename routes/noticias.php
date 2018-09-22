<?php
$this->get('noticias', function($arg) {
	echo 'Últimas Notícias';
});
$this->get('noticias/{id}', function($arg) {
	echo 'Notícia específica sobre alguma coisa';
});
$this->get('nome/{nome}', function($arg) {
	echo 'Nome: '.$arg['nome'];
});
?>