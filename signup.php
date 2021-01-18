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
   <div  style="background-image: url(bgimg.png);background-size: cover;" >'
   <div class="container text-center ">
     <h3 id="msg"></h3>
   <form  >
   <div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr" name="name" placeholder="Enter name...">
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <input type="button" onclick="sendEmail()" value="SendOTP" class="btn btn-primary" id="sendem" >
    <div id="validate" style="display:none;"><input type=number name="otp" id="otp"><input type="button" value="Validate" onclick="validate()" class="btn btn-dark" ></div> 
    <small id="sent"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="number" class="form-control" id="mobno" aria-describedby="emailHelp" placeholder="Enter mobile number">
    <small>  <input type="button" value="Send OTP" name="send"  onclick="sendotp()" class="btn btn-primary" id="senop">

    <div id="verify" style="display:none;"> <input type=number name="otp" id="otp1"><input type="button" value="Verify" onclick="verify()" class="btn btn-dark" > </div>
    <small id="notify"></small>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="Password" placeholder="Password">
  </div>
  <small>Already Registered<a href="login.php" class="">LOGIN</a></small>
 <input type="button" class="btn btn-success" value="SIGNUP" onclick="user()">
  
</form>

</div>
   </div>
   <script>
     var mobflag=0;
     var emaflag=0;
  function sendEmail(){
    var email=$("#email").val();
   
    if(email!=""){
      $.ajax({
        url:"sendEmail.php",
        type:"POST",

        
        data:{email:email},
       
        success:function(res){
            
           $('#sent').text("OTP sent successfully.");
          console.log("Message sent successfully." );
          $("#validate").css("display", "block");
         
          
          otp=res;
          
        }
    })
  }
  }
  function validate()
  { 
    var otp=$("#otp").val();
    if(otp!=""){
      $.ajax({
        url:"validate.php",
        type:"POST",

        
        data:{otp:otp},
       
        success:function(res){
            // $('#myForm')[0].reset();
            if(res=="success"){
            $('#sent').text("OTP verified.");
            $("#validate").css("display", "none");
            $("#sendem").prop('disabled', true);
            $("#email").prop('readonly', true);
            emaflag=1;
            }else{
              $('#sent').text("OTP not verified.");
            }
            console.log(res);
        }
    })
  } 
  }
  function sendotp(){
    var mobile=$("#mobno").val();
   var otp;
    if(mobile!=""){
      $.ajax({
        url:"sendotp.php",
        type:"POST",

        
        data:{mobno:mobile},
       
        success:function(res){
           
           $('#notify').text("OTP sent successfully.");
          console.log("Message sent successfully." );
          $("#verify").css("display", "block");
         
          
        }
    })
  }
  }
  function verify()
  { 
    var otp=$("#otp1").val();
    if(otp!=""){
      $.ajax({
        url:"validate.php",
        type:"POST",

        
        data:{otp:otp},
       
        success:function(res){
            
            if(res=="success"){
              mobflag=1;
            $('#notify').text("OTP verified.");
            $("#verify").css("display", "none");
            $("#senop").prop('disabled', true);
            $("#mobno").prop('readonly', true);
            }else{
              $('#verify').text("OTP not verified.");
            }
            console.log(res);
        }
    })
  } 
  }
  function user(){
    var name=$("#usr").val();
    var email=$("#email").val();
    var mobile=$("#mobno").val();
    var pass=$("#Password").val();


    if(name!=""&& email!=""&&mobile!=""&&pass!="")
    {
    if(mobflag==1&&emaflag==1){
      //  console.log(name);
      //  console.log(email);
      //  console.log(mobile);
      //  console.log(pass);
      $.ajax({
        url:"user.php",
        type:"POST",

        
        data:{name:name,mobileno:mobile,email:email,password:pass},
       
        success:function(res){
          if(res="success"){
          $('#msg').text("Signup success");
          }
          else{
            $('#msg').text("Already Registered!!");
          }
        }
    })




     }
     else{
      $('#msg').text("Verify Your email as well as mobile number!!.");
     }
    }
    else{
      $('#msg').text("Complete the Signup process!!.");
    }
  }
  </script>