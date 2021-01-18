<?php 

if(isset($_POST['email']))
{  require_once 'db.php';
  $uname=$_POST['email'];
  $password=$_POST['password'];
  $sql="select * from tbl_user WHERE  email_id='".$uname."'AND password='".$password."' limit 1";
  $result=mysqli_query($conn,$sql);
  $data = mysqli_fetch_row($result); 
  if(mysqli_num_rows($result)==1){
    //   echo "<pre>";
    //   print_r($data);
    //   echo "</pre>";
    
      if($data[7]=="0"){
        if($data[5]=="0"){
        echo "You have successfully Logged in as customer! <br> ";
      
        session_start();
        $_SESSION['id']=$data[0];
        $_SESSION['email']=$data[1];
        $_SESSION['name']=$data[2];
        $_SESSION['mobile']=$data[4];
        $_SESSION['pass']=$data[6];
        if(!isset($_SESSION['fare']))
         {
        header("Location:/CEDCAB/customer");
         }else{
          header("Location:/CEDCAB/customer/booking.php");
         }}
      }else{
      echo "You have successfully Logged in as Admin ";
      session_start();
      $_SESSION['id']=$data[0];
        $_SESSION['email']=$data[1];
      $_SESSION['name']=$data[2];
      $_SESSION['mobile']=$data[4];
      $_SESSION['pass']=$data[6];
    
     header("Location:/CEDCAB/admin");
      exit();
    }
  }  
  else{
      echo "You have entered incorrect  username/password";
      exit();
  }

}
?>






<!DOCTYPE html>
<html lang="en">
   <head>
      <title>CEdCAB</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
   <body>
   <div><?php include 'header.php';?></div>
   <div  style="background-image: url(bgimg.png);background-size: cover;">
   <div class="container text-center " style="width:40vh;padding-top:20vh;padding-bottom:20vh;" >
   <div >
        <form action="" method="POST">
        <div class="form-group">
            <label for="Email">Email</label>
            <div>
                <input class="form-control" type="email" name="email" value=""id="email" placeholder="email.." required>
            </div></div>
            <div class="form-group">
            <label for="password">Password</label>
            <div>
                <input class="form-control" type="password" name="password" id="password" placeholder="password.." required>
            </div>
            </div>
            <div>
            
            <small>New User.. <a href="signup.php" >SIGNUP</a></small>
                <input  type="submit" value="LOG IN" name="submit" id="submit" class="btn btn-success">
            </div>
          
        </form>
    </div>
    <div class="error warning-message"></div>
    <div class="page-content"></div>
  
 
</div>
   </div>