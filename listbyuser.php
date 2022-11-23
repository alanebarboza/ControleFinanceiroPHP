<!-- Header -->
<?php
session_start();
if ((!isset($_SESSION['EMAIL']))) {
    header('location: index.php');
}
?>

<?php  include "header.php" ?>

  <div class="container">
    <h1 class="text-center" >Listagem de Contas do Mês</h1>
      <a href="create.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Cadastrar Conta </a>

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
				<th  scope="col">Mês/Ano</th>
                <th  scope="col" colspan="3" class="text-center">Cadastrar Gasto</th>
            </tr>  
          </thead>
         <tbody>
          <tr>
 
          <?php
            $query="SELECT A.ID, A.GROUPDESCRIPTION, A.CARD, A.DESCRIPTION, A.DIVIDEBY, A.VALUE, A.PURCHASEDATE, B.NAME, MONTH(A.PURCHASEDATE) PURCHASEMONTH, YEAR(A.PURCHASEDATE) PURCHASEYEAR FROM BILLS A 
					INNER JOIN USERACCOUNT B ON B.ID = A.USERACCOUNTID 
					WHERE A.USERACCOUNTID = $_SESSION['USERACCOUNTID'] AND MONTH(A.PURCHASEDATE) = MONTH(CURDATE()) AND YEAR(A.PURCHASEDATE) = YEAR(CURDATE())
					ORDER BY PURCHASEYEAR DESC, PURCHASEMONTH + PURCHASEYEAR ASC";           
            $view_users= mysqli_query($conn,$query);

            while($row= mysqli_fetch_assoc($view_users)){
				$ID = $row['ID'];
				$NAME = $row['NAME'];
				$GROUPDESCRIPTION = $row['GROUPDESCRIPTION'];
				$CARD = $row['CARD'];
				$DESCRIPTION = $row['DESCRIPTION'];
				$DIVIDEBY = $row['DIVIDEBY'];
				$VALUE = number_format($row['VALUE'] , 2, ',', '.');
				$PURCHASEDATE = $row['PURCHASEDATE'];
				$PURCHASEMONTH = $row['PURCHASEMONTH'];
				$PURCHASEYEAR = $row['PURCHASEYEAR'];

                echo "<tr >";
				echo " <th scope='row' >{$ID}</th>";
				echo " <td > {$NAME}</td>";
				echo " <td > {$GROUPDESCRIPTION}</td>";
				echo " <td > {$CARD}</td>";
				echo " <td > {$DESCRIPTION}</td>";
				echo " <td >{$DIVIDEBY} </td>"; 
				echo " <td > {$VALUE} </td>"; 
				echo " <td >{$PURCHASEMONTH}/{$PURCHASEYEAR} </td>"; 

				echo " <td class='text-center'> <a href='view.php?bill_id={$ID}' class='btn btn-primary'> <i class='bi bi-eye'></i> Visualizar </a> </td>";
				echo " <td class='text-center' > <a href='update.php?edit&bill_id={$ID}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar </a> </td>";
				echo " <td  class='text-center'>  <a href='delete.php?delete={$ID}' class='btn btn-danger'> <i class='bi bi-trash'></i> Apagar </a> </td>";
				
				echo " </tr> ";
                }  
                ?>
              </tr>  
            </tbody>
        </table>
		
		<br>
		
		
       <h4 class="text-center" > Totais por Grupo </h4>
	
        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
				<th  scope="col" >Usuário</th>
				<th  scope="col"> Grupo </th>
				<th  scope="col"> Valor </th>
            </tr>  
          </thead>
         <tbody>
          <tr>
 
          <?php
            $query="SELECT B.NAME, A.GROUPDESCRIPTION, SUM(A.VALUE) TOTAL FROM BILLS A 
					INNER JOIN USERACCOUNT B ON B.ID = A.USERACCOUNTID 
					WHERE MONTH(A.PURCHASEDATE) = MONTH(CURDATE()) AND YEAR(A.PURCHASEDATE) = YEAR(CURDATE())
					GROUP BY B.NAME, A.GROUPDESCRIPTION
					ORDER BY 1,2";       
            $view_users= mysqli_query($conn,$query);
			
			$oldName = "";
            while($row= mysqli_fetch_assoc($view_users)){
				if($oldName != $row['NAME']){
					$NAME = $row['NAME'];
				}else{
					$NAME ="";
				}
				$oldName = $row['NAME'];					
				
				$GROUPDESCRIPTION = $row['GROUPDESCRIPTION'];
				$TOTAL = 'R$' . number_format($row['TOTAL'] , 2, ',', '.');
				
                echo "<tr >";
				echo " <td > {$NAME}</td>";
				echo " <td > {$GROUPDESCRIPTION}</td>";
				echo " <td >{$TOTAL} </td>"; 
				echo " </tr> ";
                }  
                ?>
              </tr>  
            </tbody>
        </table>
		
       <h4 class="text-center" > Totais por Usuário </h4>
	
        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
				<th  scope="col" >Usuário</th>
				<th  scope="col"> Valor </th>
            </tr>  
          </thead>
         <tbody>
          <tr>
 
          <?php
            $query="SELECT B.NAME, SUM(A.VALUE) TOTAL FROM BILLS A 
					INNER JOIN USERACCOUNT B ON B.ID = A.USERACCOUNTID 
					WHERE MONTH(A.PURCHASEDATE) = MONTH(CURDATE()) AND YEAR(A.PURCHASEDATE) = YEAR(CURDATE())
					GROUP BY B.NAME
					ORDER BY 1";       
            $view_users= mysqli_query($conn,$query);

            while($row= mysqli_fetch_assoc($view_users)){
				$NAME = $row['NAME'];
				$TOTAL = 'R$' . number_format($row['TOTAL'] , 2, ',', '.');
				
                echo "<tr >";
				echo " <td > {$NAME}</td>";
				echo " <td >{$TOTAL} </td>"; 
				echo " </tr> ";
                }  
                ?>
              </tr>  
            </tbody>
        </table>		
  </div>

<!-- a BACK button to go to the index page -->
<div class="container text-center mt-5">
      <a href="max-width: 468pxindex.php" class="btn btn-warning mt-5"> Voltar </a>
    <div>

<!-- Footer -->
<?php include "footer.php" ?>