<?php 

include 'classload.php';

if(isset($_POST['user'], $_POST['pass'])){
	$login = $admin_main->admin_login($_POST['user'],$_POST['pass']);
	echo $login;
}

