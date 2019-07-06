<?php 
require_once('../lib/core.php');

//load class
$main = new nepska_election();



//auth check
if(!isset($_SESSION['id'])){
	die(header("location: auth.php"));
}