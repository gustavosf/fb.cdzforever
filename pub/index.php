<?php

header('Content-Type: text/html; charset=utf-8');

define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);

require ROOT.DS.'cfg'.DS.'config.php';
require ROOT.DS.'lib'.DS.'shared.php';

// Configuração das rotas
require ROOT.DS.'routes.php';

$path = trim(@$_SERVER['QUERY_STRING'], '/');
$method = $_SERVER['REQUEST_METHOD'];

// Chamada de uma rota
if (!Router::route($method, $path)) {
	echo "404 manolo :(";
}