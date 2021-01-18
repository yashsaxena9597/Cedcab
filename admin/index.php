
<?php session_start();
if(!isset($_SESSION['name'])){
    header("Location:/CEDCAB/login.php");
}$count=0;$blockuser=0;$active=0;
$pending=0;$compl=0;$cance=0;$c=0;$exp=0;
$loc=0;
require_once '/opt/lampp/htdocs/CEDCAB/db.php';
$id=$_SESSION['id'];
$query= "SELECT * FROM `tbl_ride` ";
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
  $query= "SELECT * FROM `tbl_user`";
  $results = mysqli_query($conn,$query);
$records = mysqli_num_rows($results);

if(!empty($records)){
    while($row= mysqli_fetch_assoc($results))
    {$count++;
        if($row['status']==0)
        {
            $active++;
        }
        else{
        $blockuser++;
        }}}

        $query= "SELECT * FROM `tbl_location`";
        $results = mysqli_query($conn,$query);
        $records = mysqli_num_rows($results);
        if(!empty($records)){
            while($row= mysqli_fetch_assoc($results)){
                $loc++;}
            }


?>
<div>
<?php include 'header.php'?>
</div>
<div class="container" style="margin-top:2%;">
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
       <a href="riderequest.php"> <h5 class="card-title"> Ride Request</h5></a>
        <p class="card-text"><?php echo $pending  ?></p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <a href="completed_ride.php"> <h5 class="card-title">Completed Rides</h5></a>
        <p class="card-text"><?php echo $compl ?></p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <a href="cancelled_ride.php"> <h5 class="card-title">Cancelled Rides</h5></a>
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

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
       <a href="unblockuser.php"> <h5 class="card-title">Blocked User</h5></a>
        <p class="card-text"><?php echo $blockuser ?></p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <a href="blockuser.php"> <h5 class="card-title">Active user</h5></a>
        <p class="card-text"><?php echo $active ?></p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <a href="alluser.php"> <h5 class="card-title">All users</h5></a>
        <p class="card-text"><?php echo $count  ?></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <a href="location.php"> <h5 class="card-title">Location list</h5></a>
        <p class="card-text"><?php echo $loc ?></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-12 text-center" style="margin-top:2%;">
    <div class="card">
      <div class="card-body">
      <a href="newloc.php"> <h5 class="card-title">Add new location</h5></a>
        <p class="card-text"><?php  ?></p>
        
      </div>
    </div>
  </div>

</div>
</div>
