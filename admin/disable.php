<?php 
session_start();
if((isset($_POST['location']))&&(isset($_POST['dist']))){
    $id=$_POST['id'];
$location=$_POST['location'];
$distance=$_POST['dist'];
// echo "$name";



    require_once '/opt/lampp/htdocs/CEDCAB/db.php';
    $stu_query=" UPDATE tbl_location SET name='".$location."',distance='".$distance."' WHERE id='".$id."'";
    // $stu_query="INSERT INTO `tbl_location` (`id`, `name`, `distance`, `is_available`) VALUES (NULL, '$loc', '$dist', '1')";
    $result= mysqli_query($conn,$stu_query);
     if($result){
        echo 1; 
    }else{
       echo 0;
    }
    
}
if(isset($_POST['availa'])){
    $id=$_POST['id'];
    $availa=$_POST['availa'];
    require_once '/opt/lampp/htdocs/CEDCAB/db.php';
    $stu_query=" UPDATE tbl_location SET is_available='".$availa."' WHERE id='".$id."'";
    // $stu_query="INSERT INTO `tbl_location` (`id`, `name`, `distance`, `is_available`) VALUES (NULL, '$loc', '$dist', '1')";
    $result= mysqli_query($conn,$stu_query);
     if($result){
        echo 1; 
    }else{
       echo 0;
    }
}