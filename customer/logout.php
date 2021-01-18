<?php

session_start();
session_destroy();
header("Location:/CEDCAB/login.php");
?>