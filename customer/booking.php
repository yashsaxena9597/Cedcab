<?php

session_start();
$pic= $_SESSION['pickup'];
     $dro= $_SESSION['drop'];
    $dis= $_SESSION['dist'];
    $fare= $_SESSION['fare'];
    $cab= $_SESSION['cab'];
    // $luggage= $_SESSION['weight'];
    $id= $_SESSION['id'];

    $status=0;
    if($_SESSION['weight']=="")
    {
        $luggage=0;
    }
    else{
       $luggage= $_SESSION['weight'];
    }
     $id."<br>";
     $pic."<br>";
     $dro."<br>";
     $dis."<br>";
     $fare."<br>";
     $luggage."<br>";
     $cab."<br>";
     require_once '/opt/lampp/htdocs/CEDCAB/db.php';

    //  $stu_query="INSERT INTO tbl_ride (ride_date,cab_type,from,to,total_distance,luggage,total_fare,status,customer_user_id) 
    // VALUES (NOW(),'$cab','$pic','$dro','$dis','$luggage','$fare','$status','$id')";

$stu_query="INSERT INTO tbl_ride ( `ride_date`, `cab_type`, `from`, `to`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id`) 
VALUES ( NOW(), '$cab', '$pic', '$dro', '$dis', '$luggage', '$fare', '$status', '$id')";
     $result= mysqli_query($conn,$stu_query);
     if($result){
         echo "Your ride is booked pending for approval!";
         header("refresh:1; url=/CEDCAB/customer"); die;


     }else{
        echo "booking Failed!!";
     }

?>