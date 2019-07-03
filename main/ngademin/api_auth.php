<?php 

include 'classload.php';

if(isset($_GET['logout'])){
	$admin_main->global_logout();
}

if(isset($_POST['user'], $_POST['pass'])){
	$login = $admin_main->admin_login($_POST['user'],$_POST['pass']);
	echo $login;
}

