<?php 
include 'classload.php';

	if(isset($_POST['login'], $_POST['user'], $_POST['pass'])){
		
		if($_POST['login'] === 'umsida'){
			echo 'Deploy';
		}
		
		$login = $main->login($_POST['user'], $_POST['pass']);
			echo $login;


	}

	if(isset($_POST['email'], $_POST['user'], $_POST['pass'])){
		$register = $main->register($_POST['email'], $_POST['user'], $_POST['pass']);
		echo $register;
	}

?>