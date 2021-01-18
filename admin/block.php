<?php 
session_start();

if(isset($_POST['availa'])){
    $id=$_POST['id'];
    $availa=$_POST['availa'];
    require_once '/opt/lampp/htdocs/CEDCAB/db.php';
    $stu_query=" UPDATE tbl_user SET status='".$availa."' WHERE user_id='".$id."'";
    // $stu_query="INSERT INTO `tbl_location` (`id`, `name`, `distance`, `is_available`) VALUES (NULL, '$loc', '$dist', '1')";
    $result= mysqli_query($conn,$stu_query);
     if($result){
        echo 1; 
    }else{
       echo 0;
    }
}