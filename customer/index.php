<?php session_start();
if(!isset($_SESSION['name'])){
    header("Location:/CEDCAB/login.php");
}
$pending=0;$compl=0;$cance=0;$c=0;$exp=0;
require_once '/opt/lampp/htdocs/CEDCAB/db.php';
$id=$_SESSION['id'];
$query= "SELECT * FROM `tbl_ride` WHERE customer_user_id='$id'";
$results = mysqli_query($conn,$query);
$records = mysqli_num_rows($results);
if(!empty($records)){
  while($row= mysqli_fetch_assoc($results))
  {$c++;
    if($row['status']==0){$pending++;}
    else if($row['status']==1){
      $compl++;$exp +=$row['total_fare'];
    }
    else {$cance++;}
  }}
?>
<div>
<?php include 'header.php'?>
</div>
<div class="container" style="margin-top:2%;">
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
       <a href="pendingrides.php"> <h5 class="card-title">Pending Rides</h5></a>
        <p class="card-text"><?php echo $pending ?></p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <a href="approvedride.php"> <h5 class="card-title">Completed Rides</h5></a>
        <p class="card-text"><?php echo $compl ?></p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <a href="cancelledride.php"> <h5 class="card-title">Cancelled Rides</h5></a>
        <p class="card-text"><?php  echo $cance; ?></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <a href="allrides.php"> <h5 class="card-title">All rides</h5></a>
        <p class="card-text"><?php echo $c; ?></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-12 text-center" style="margin-top:2%;">
    <div class="card">
      <div class="card-body">
      <a href="allrides.php"> <h5 class="card-title">Total expenses</h5></a>
        <p class="card-text"><?php echo $exp ?></p>
        
      </div>
    </div>
  </div>

</div>
</div>
