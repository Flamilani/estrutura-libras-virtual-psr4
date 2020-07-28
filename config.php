<?php 
require 'environment.php';

global $config;
$config = array();

if(ENVIRONMENT == 'development') {
	define("BASE", "http://localhost/estrutura_ead_psr4/");
	$config['host'] = 'localhost';
	$config['dbname'] = 'mod_ead';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '123123';
} else {
	define("BASE", "http://ead.librasvirtual.com.br/");
	$config['host'] = 'mysql.hostinger.com.br';
	$config['dbname'] = 'u361999016_base';
	$config['dbuser'] = 'u361999016_admin';
	$config['dbpass'] = 'baseLibras12';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'], 
	array(PDO::ATTR_TIMEOUT => 5));
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}

 ?>