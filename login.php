<?php include "db.php" ?>

<?php
	$EMAIL = $_POST['EMAIL'];
	$PASSWORD = md5($_POST['PASSWORD']);

    $query = mysqli_query($conn, "SELECT * FROM USERACCOUNT WHERE EMAIL ='$EMAIL' AND PASSWORD = '$PASSWORD'");
    $add_user = mysqli_query($conn,$query);
   
	if(!$add_user){
		echo"<script language='javascript' type='text/javascript'>
		alert('Login e/ou senha incorretos');window.location
		.href='	index.php';</script>";
		die();
	}else{
		setcookie("login",$login);
		header("Location:home.php");
	}
?>