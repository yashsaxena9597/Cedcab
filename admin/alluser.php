<?php 
session_start();
if(!isset($_SESSION['name'])){
  header("Location:/CEDCAB/login.php");
}
require_once '/opt/lampp/htdocs/CEDCAB/db.php';
$query= "SELECT * FROM `tbl_user`";
$results = mysqli_query($conn,$query);
$records = mysqli_num_rows($results);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<body>
<div >
<?php include "header.php"?></div>
<div class="container  ">
<table class="table" id="myTable">
    <thead>
      <tr>
      <th>ID</th>
        <th> Email ID</th>
        <th> Name</th>
        <th>Date</th>
       <th>Mobile Number</th>
       
      </tr>
    </thead>
    <tbody>
     
          <?php
          
               if(!empty($records)){
                   while($row= mysqli_fetch_assoc($results))
                   {
                       ?>
                         <tr>
                         <th><?php echo $row['user_id']?></th>
                             <td><?php echo $row['email_id']?></td>
                             <td><?php echo $row['name']?></td>
                                <td><?php echo $row['dateofsignup']?></td>
                                <td><?php echo $row['mobile']?></td>
                              
                               
        
                                
                                </tr>

                                <?php
                   }
               }
          
          ?>




          
      
     
    </tbody>
  </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" >

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>