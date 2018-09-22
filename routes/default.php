<?php

/*
* arquivo de rotas padrão
* pode-se carregar vários outros arquivos de rotas
*/
 
$this->get('', function($arg) {
	echo 'Página Inicial';
});

/*
* exemplos
$this->get('noticias', function() {
	echo 'Últimas Notícias';
});
$this->get('noticias/{id}', function($arg) {
	echo 'Notícia específica sobre alguma coisa';
});
*/

$this->loadRouteFile('noticias');
?>