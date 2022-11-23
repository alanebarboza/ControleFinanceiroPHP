<!-- Header -->
<?php  include 'header.php'?>
<?php
session_start();
if ((!isset($_SESSION['EMAIL']))) {
    header('location:index.php');
}
?>
<h1 class="text-center">Detalhes da Conta</h1>
  <div class="container">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-dark">
        <tr>
		  <th  scope="col" >ID</th>
          <th  scope="col" >Usuário</th>
          <th  scope="col">Grupo</th>
          <th  scope="col">Cartão</th>
          <th  scope="col">Descrição</th>
		  <th  scope="col">Parcelas</th>
		  <th  scope="col">Valor</th>
		  <th  scope="col">Data</th>
		  <th  scope="col">Mês/Ano</th>
        </tr>  
      </thead>
        <tbody>
          <tr>
 
            <?php
              if (isset($_GET['bill_id'])) {
                  $bill_id = $_GET['bill_id']; 

                  // SQL query to fetch the data where id=$userid & storing data in view_user 
                  $query="SELECT A.ID, A.GROUPDESCRIPTION, A.CARD, A.DESCRIPTION, A.DIVIDEBY, A.VALUE, A.PURCHASEDATE, B.NAME, MONTH(A.PURCHASEDATE) PURCHASEMONTH, YEAR(A.PURCHASEDATE) PURCHASEYEAR
						  FROM BILLS A
  						  INNER JOIN USERACCOUNT B ON B.ID = A.USERACCOUNTID
						  WHERE A.ID = {$bill_id}
						  ORDER BY PURCHASEYEAR DESC, PURCHASEMONTH + PURCHASEYEAR ASC"; 

                  $view_users= mysqli_query($conn,$query);            

                  while($row = mysqli_fetch_assoc($view_users))
                  {
                      $ID = $row['ID'];
                      $NAME = $row['NAME'];
                      $GROUPDESCRIPTION = $row['GROUPDESCRIPTION'];
					  $CARD = $row['CARD'];
                      $DESCRIPTION = $row['DESCRIPTION'];
					  $DIVIDEBY = $row['DIVIDEBY'];
					  $VALUE = $row['VALUE'];
					  $PURCHASEDATE = $row['PURCHASEDATE'];
					  $PURCHASEMONTH = $row['PURCHASEMONTH'];
					  $PURCHASEYEAR = $row['PURCHASEYEAR'];

						echo "<tr >";
						echo " <td >{$ID}</td>";
						echo " <td > {$NAME}</td>";
						echo " <td > {$GROUPDESCRIPTION}</td>";
						echo " <td > {$CARD}</td>";
						echo " <td > {$DESCRIPTION}</td>";
						echo " <td >{$DIVIDEBY} </td>"; 
						echo " <td >{$VALUE} </td>"; 
						echo " <td >{$PURCHASEDATE} </td>"; 
						echo " <td >{$PURCHASEMONTH}/{$PURCHASEYEAR} </td>"; 
						
						echo " </tr> ";
                  }
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

   <!-- a BACK Button to go to pervious page -->
  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Voltar </a>
  <div>

<!-- Footer -->
<?php include "footer.php" ?>