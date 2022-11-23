 <!-- Footer -->
<?php  include "header.php" ?>
<?php
session_start();
if ((!isset($_SESSION['EMAIL']))) {
    header('location:index.php');
}
?>
<?php
   if(isset($_GET['bill_id']))
    {
      $bill_id = $_GET['bill_id']; 
    }

     $query="SELECT * FROM BILLS WHERE ID = $bill_id ";
     $view_users= mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($view_users))
	{
	  $ID = $row['ID'];
	  $USERACCOUNTID = $row['USERACCOUNTID'];
	  $GROUPDESCRIPTION = $row['GROUPDESCRIPTION'];
	  $CARD = $row['CARD'];
	  $DESCRIPTION = $row['DESCRIPTION'];
	  $DIVIDEBY = $row['DIVIDEBY'];
	  $VALUE = $row['VALUE'];
	  $PURCHASEDATE = date("Y-m-d", strtotime($row['PURCHASEDATE']));
	}
 
    //Processing form data when form is submitted
    if(isset($_POST['update'])) 
    {
	  $USERACCOUNTID = $_POST['USERACCOUNTID'];
	  $GROUPDESCRIPTION = $_POST['GROUPDESCRIPTION'];
	  $CARD = $_POST['CARD'];
	  $DESCRIPTION = $_POST['DESCRIPTION'];
	  $DIVIDEBY = $_POST['DIVIDEBY'];
	  $VALUE = $_POST['VALUE'];
	  $PURCHASEDATE = $_POST['PURCHASEDATE'];
	  
      $query = "UPDATE BILLS SET USERACCOUNTID = '{$USERACCOUNTID}' , GROUPDESCRIPTION = '{$GROUPDESCRIPTION}' , CARD = '{$CARD}' , DESCRIPTION = '{$DESCRIPTION}' , DIVIDEBY = '{$DIVIDEBY}' , VALUE = '{$VALUE}' , PURCHASEDATE = '{$PURCHASEDATE}' WHERE ID = $bill_id";

      $update_user = mysqli_query($conn, $query);
      echo "<script type='text/javascript'>alert('Conta salva com sucesso.')</script>";
    }             
?>

<h1 class="text-center">Editar Conta</h1>
  <div class="container ">
    <form action="" method="post">
 <div class="form-group">
        <label for="USERACCOUNTID" class="form-label">Usuário</label>
        <input type="text" id="USERACCOUNTID"name="USERACCOUNTID"  class="form-control"  value="<?php echo $USERACCOUNTID  ?>">
      </div>
	  
      <div class="form-group">
        <label for="GROUPDESCRIPTION" class="form-label">Grupo</label>
        <input type="text" id="GROUPDESCRIPTION" name="GROUPDESCRIPTION"  class="form-control" value="<?php echo $GROUPDESCRIPTION  ?>">
      </div>

      <div class="form-group">
        <label for="DESCRIPTION" class="form-label">Descrição</label>
        <input type="text" id="DESCRIPTION"name="DESCRIPTION"  class="form-control" value="<?php echo $DESCRIPTION  ?>">
      </div>
	  
      <div class="form-group">
        <label for="CARD" class="form-label">Cartão</label>
        <input type="text" id="CARD" name="CARD"  class="form-control" value="<?php echo $CARD  ?>">
      </div>	  
	  
      <div class="form-group">
        <label for="DIVIDEBY" class="form-label">Parcelas</label>
        <input type="number" id="DIVIDEBY" name="DIVIDEBY"  class="form-control" value="<?php echo $DIVIDEBY  ?>">
      </div>

      <div class="form-group">
        <label for="VALUE" class="form-label">Valor</label>
        <input type="number" id="VALUE"name="VALUE"  class="form-control" value="<?php echo $VALUE  ?>">
      </div>	

      <div class="form-group">
        <label for="PURCHASEDATE" class="form-label">Data </label>
        <input type="text" id="PURCHASEDATE"name="PURCHASEDATE"  class="form-control" value="<?php echo $PURCHASEDATE  ?>"placeholder="yyyy-mm-dd" onkeyup="
			  var date = this.value;
			  if (date.match(/^\d{4}$/) !== null) {
				 this.value = date + '-';
			  } else if (date.match(/^\d{4}\-\d{2}$/) !== null) {
				 this.value = date + '-';
			  }" maxlength="10">
      </div>		 

      <div class="form-group">
         <input type="submit"  name="update" class="btn btn-primary mt-2" value="update">
      </div>
    </form>    
  </div>

    <!-- a BACK button to go to the home page -->
    <div class="container text-center mt-5">
      <a href="home.php" class="btn btn-warning mt-5"> Voltar </a>
    <div>

<!-- Footer -->
<?php include "footer.php" ?>