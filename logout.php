<?php
	session_start();
	unset($_SESSION['USERACCOUNTID']);
	unset($_SESSION['EMAIL']);
	unset($_SESSION['PASSWORD']);
	unset($_SESSION['NAME']);
								
	header('location:index.php');
	die();
?>