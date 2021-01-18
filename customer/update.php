<?php 
session_start();
if((isset($_POST['name']))&&(isset($_POST['Pass']))){
$name=$_POST['name'];
$pass=$_POST['Pass'];
// echo "$name";
$email=$_POST['email'];

if ($pass==$_SESSION['pass']){
    require_once '/opt/lampp/htdocs/CEDCAB/db.php';
    $stu_query=" UPDATE tbl_user SET name='".$name."' WHERE email_id='".$email."'";
    // $stu_query="INSERT INTO `tbl_location` (`id`, `name`, `distance`, `is_available`) VALUES (NULL, '$loc', '$dist', '1')";
    $result= mysqli_query($conn,$stu_query);
     if($result){
        echo 1; 
    }else{
       echo 0;
    }
    }else {
        echo 2;
    }
}
  
?>