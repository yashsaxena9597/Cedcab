<?php

if(isset($_GET['id'])&& $_GET['id']!=''){
    $stat=2;
    require_once '/opt/lampp/htdocs/CEDCAB/db.php';
    $id =$_GET['id'];
    $stu_query=" UPDATE tbl_ride SET status='".$stat."' WHERE ride_id='".$id."'";
    $result=mysqli_query($conn,$stu_query);
    if($result){
       
        header("Location:pendingrides.php?msg=can");
    }
else{
    echo "not removed";
}}

    ?>