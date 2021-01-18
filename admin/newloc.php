<?php 
if((isset($_POST['loca']))&&(isset($_POST['dista']))){
$loc=$_POST['loca'];
$dist=$_POST['dista'];
echo $loc;
require_once '/opt/lampp/htdocs/CEDCAB/db.php';
$stu_query="INSERT INTO `tbl_location` (`id`, `name`, `distance`, `is_available`) VALUES (NULL, '$loc', '$dist', '1')";
$result= mysqli_query($conn,$stu_query);
if($result){
    echo "location inserted!"; die;
}else{
   echo "Location  Failed!!";
}

}
?>





<div >
<?php session_start();?>
<?php include "header.php"?></div>

<div class="container">

  <form action="newloc.php" method="POST">
    <div class="form-group">
      <label for="name">Location:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter location" name="loca">
    </div>
    <div class="form-group">
      <label for="dist">Distance:</label>
      <input type="number" class="form-control" id="dist" placeholder="Enter Distance" name="dista">
    </div>
   
    <input type="submit" class="btn btn-primary"value="SUBMIT">
  </form>
</div>

</body>
</html>
