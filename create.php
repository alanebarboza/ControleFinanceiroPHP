<!-- Header -->
<?php  include "header.php" ?>

<?php
session_start();
if ((!isset($_SESSION['EMAIL']))) {
    header('location:index.php');
}
?>
<?php 
  if(isset($_POST['create'])) 
    {
		$USERACCOUNTID = $_SESSION['USERACCOUNTID'];
		$GROUPDESCRIPTION = $_POST['GROUPDESCRIPTION'];
		$CARD = $_POST['CARD'];
		$DESCRIPTION = $_POST['DESCRIPTION'];
		$DIVIDEBY = $_POST['DIVIDEBY'];
		$VALUE =  floatval($_POST['VALUE']);
		$PURCHASEDATE = $_POST['PURCHASEDATE'];
		
        // SQL query to insert user data into the USERACCOUNT table
        $query= "INSERT INTO BILLS(USERACCOUNTID, GROUPDESCRIPTION, CARD, DESCRIPTION, DIVIDEBY, VALUE, PURCHASEDATE) VALUES('{$USERACCOUNTID}','{$GROUPDESCRIPTION}','{$CARD}','{$DESCRIPTION}','{$DIVIDEBY}','{$VALUE}','{$PURCHASEDATE}')";
		
        $add_user = mysqli_query($conn,$query);
    
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_user) {
              echo "Ocorreu algum erro ". mysqli_error($conn);
          }

          else { echo "<script type='text/javascript'>alert('Conta Cadastrada com Sucesso.')</script>";
              }         
    }
?>

<h1 class="text-center"> Detalhes Usuário </h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="GROUPDESCRIPTION" class="form-label">Grupo</label>
        <input type="text" id="GROUPDESCRIPTION" name="GROUPDESCRIPTION"  class="form-control">
      </div>

      <div class="form-group">
        <label for="DESCRIPTION" class="form-label">Descrição</label>
        <input type="text" id="DESCRIPTION"name="DESCRIPTION"  class="form-control">
      </div>
	  
      <div class="form-group">
        <label for="CARD" class="form-label">Cartão</label>
        <input type="text" id="CARD" name="CARD"  class="form-control">
      </div>	  
	  
      <div class="form-group">
        <label for="DIVIDEBY" class="form-label">Parcelas</label>
        <input type="number" id="DIVIDEBY" name="DIVIDEBY"  class="form-control">
      </div>

      <div class="form-group">
        <label for="VALUE" class="form-label">Valor</label>
        <input type="number" id="VALUE"name="VALUE"  class="form-control">
      </div>	

      <div class="form-group">
        <label for="PURCHASEDATE" class="form-label">Data</label>
        <input type="text" id="PURCHASEDATE"name="PURCHASEDATE"  class="form-control" placeholder="yyyy-mm-dd" onkeyup="
			  var date = this.value;
			  if (date.match(/^\d{4}$/) !== null) {
				 this.value = date + '-';
			  } else if (date.match(/^\d{4}\-\d{2}$/) !== null) {
				 this.value = date + '-';
			  }" maxlength="10">
      </div>		  

      <div class="form-group">
        <input type="submit"  name="create" class="btn btn-primary mt-2" value="salvar">
      </div>
    </form> 
  </div>

   <!-- a BACK button to go to the home page -->
  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Voltar </a>
  <div>


<!-- Footer -->
<?php include "footer.php" ?>
