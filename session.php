<?php session_start();
if(!isset($_SESSION['name'])){
    header("Location:/CEDCAB/login.php");
}
else{
    header("Location:/CEDCAB/customer/booking.php");
}
?>