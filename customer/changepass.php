<div>
<?php session_start();if(!isset($_SESSION['name'])){
    header("Location:/CEDCAB/login.php");
}?>
<?php include "header.php"?></div>

<div class="container">
<div class="alert" id="notify"></div>
  <form  method="POST">
  <div class="form-group">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" class="form-control" id="Password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> New Password</label>
    <input type="password" class="form-control" id="new" placeholder="NEw Password">
  </div>
   
    
    <input type="button" class="btn btn-primary"value="Change Password" onclick="change()">
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

function change()
{

var newpass = document.getElementById('new').value;
// console.log(newpass);
var Pass = document.getElementById('Password').value;
// console.log(Pass);
$.ajax({
        url:"change.php",
        type:"POST",

        
        data:{newpass:newpass,Pass:Pass},
       
        success:function(res){
            // console.log(res);
          if(res==1){
            console.log("Password is changed successfully");
            $('#notify').text("Password is changed successfully!");
          }
          else if(res==2){
            console.log("Password is incorrect");
            $('#notify').text("Password is incorrect!");
          }else{
            console.log("Password is not changed");
            $('#notify').text("Password is not changed!");
          }
          
       
          
        }
    })

}

</script>
</body>
</html>