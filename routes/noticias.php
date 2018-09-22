<?php
$this->get('noticias', function($arg) {
	echo 'Últimas Notícias';
});
$this->get('noticias/{id}', function($arg) {
	echo 'Notícia específica sobre alguma coisa';
});
?>