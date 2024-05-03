<?php 
session_start(); 

include('dbconfig.php');



if (!$_SESSION['username']) {
	// code...
	header('Location: login.php');
}

?>