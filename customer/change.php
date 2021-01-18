<?php 
session_start();
if((isset($_POST['newpass']))&&(isset($_POST['Pass']))){
$newpass=$_POST['newpass'];
$pass=$_POST['Pass'];

$email=$_SESSION['email'];

 if ($pass==$_SESSION['pass']){
     require_once '/opt/lampp/htdocs/CEDCAB/db.php';
     $stu_query=" UPDATE tbl_user SET password='".$newpass."' WHERE email_id='".$email."'";
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