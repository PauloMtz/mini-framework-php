<?php
session_start();
require 'config.php';

/*
* página inicial do sistema
* carrega o arquivo onde ele estiver
*/

spl_autoload_register(function($class) {

	if (file_exists('modules/'.$class.'/'.$class.'.php')) {
		require 'modules/'.$class.'/'.$class.'.php';
	}
});

Core::getInstance()->run($config);
?>