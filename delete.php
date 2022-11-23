 <!-- Footer -->
<?php  include "header.php" ?>
<?php
session_start();
if ((!isset($_SESSION['EMAIL']))) {
    header('location:index.php');
}
?>
<?php 
     if(isset($_GET['delete']))
     {
         $BILL_ID= $_GET['delete'];

         // SQL query to delete data from user table where id = $userid
         $query = "DELETE FROM BILLS WHERE id = {$BILL_ID}"; 
         $delete_query= mysqli_query($conn, $query);
         header("Location: home.php");
     }
              ?>

  <!-- Footer -->
<?php include "footer.php" ?>