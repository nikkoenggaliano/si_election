<?php 

$local_config = array(
	'from' => 'global' //change it to campus name to make it private
);

$config = array(
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'database' => 'si_election'
);

$koneksi = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);

if(mysqli_connect_errno()) {
	die('Sorry can not connecy');
}