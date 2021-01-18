<?php 
session_start();
if(!isset($_SESSION['name'])){
  header("Location:/CEDCAB/login.php");
}
require_once '/opt/lampp/htdocs/CEDCAB/db.php';
$query= "SELECT * FROM `tbl_location`";
$results = mysqli_query($conn,$query);
$records = mysqli_num_rows($results);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<body>
<div >
<?php include "header.php"?></div>
<div class="container col-md-5 ">
<table class="table" id="myTable">
    <thead>
      <tr>
      <th>ID</th>
        <th> Name</th>
        <th> Distance</th>
        <th>Available</th>
       <th>Action</th>
      
      </tr>
    </thead>
    <tbody>
     
          <?php
          
               if(!empty($records)){
                   while($row= mysqli_fetch_assoc($results))
                   {
                       ?>
                         <tr>
                         <th><?php echo $row['id']?></th>
                             <td><?php echo $row['name']?></td>
                             <td><?php echo $row['distance']?></td>
                             <?php if($row['is_available']==0){ ?>
                                <td>Blocked</td>
                             <?php } else{ ?>
                              <td>Unblocked</td>
                             <?php } ?>
                                <td>
                                 <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-outline-warning">UPDATE</a>
                                 </td>
                                
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