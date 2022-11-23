<!-- Header -->
<?php  include "header.php" ?>

<?php
  if(isset($_POST['login'])) 
  {
	session_start();
	$EMAIL = $_POST['EMAIL'];
	$PASSWORD = md5($_POST['PASSWORD']);

    $result=mysqli_query($conn,"SELECT * FROM USERACCOUNT WHERE EMAIL ='$EMAIL' AND PASSWORD = '$PASSWORD'");
    $array = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result)>0) 
	{
		$_SESSION['USERACCOUNTID'] = $array["ID"];
		$_SESSION['EMAIL'] = $array["EMAIL"];
		$_SESSION['PASSWORD'] = $array["PASSWORD"];	
		$_SESSION['NAME'] = $array["NAME"];	
	
		header("Location:home.php");	
	}	
	else{
	    unset($_SESSION['USERACCOUNTID']);
		unset($_SESSION['EMAIL']);
		unset($_SESSION['PASSWORD']);
		unset($_SESSION['NAME']);
				
		echo"<script language='javascript' type='text/javascript'>
		alert('Login e/ou senha incorretos');window.location
		.href='	index.php';</script>";
		die();
	}
  }
?>

<!-- body -->
<div class="container mt-5">
    <h1 class="text-center"> Controle de gastos - Barboza </h1>
        <p class="text-center">
            Planilha de Lançamento de gastos Mensais.
        </p>
  <div class="container">
    <form action="" method="post">
        <div class="from-group text-center">
			  <div class="form-group">
					<label for="EMAIL" class="form-label">Email</label>
					<input type="email" id="EMAIL" name="EMAIL"  class="form-control">
			  </div>
			  <div class="form-group">
					<label for="PASSWORD" class="form-label">Senha</label>
					<input type="password" id="PASSWORD" name="PASSWORD"  class="form-control">
			  </div> 			
	  
              <input type="submit"  name="login" class="btn btn-primary mt-2" value="Entrar">
        </div>
    </form>

  </div>
</div>


<!-- Footer -->
<?php include "footer.php" ?>