<?php 
include 'classload.php';

$find = $main->set_election();

if(!$find !== NULL){
	die(header("location: vote.php?kode=".$find['kode']));
}