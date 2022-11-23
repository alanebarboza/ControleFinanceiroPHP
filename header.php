<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="jquery.maskMoney.js" type="text/javascript"></script>

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <form action="logout.php" method="post">
	<div class="container">
		<div class="row">
			<div class="group">
				<input type="submit"  name="sair" class="btn btn-primary mt-2" value="sair" >			
			</div>
		</div>
	</div>
	<title>Controle Gastos Mensais.</title>	
	</form>	 
</head>
<body>
<style>
.group{
    display:flex;
    aling-items: center;
    justify-content:  flex-end;
	padding-right: 1.2rem;
}
</style>
